<?php
require_once __DIR__ . '/vendor/autoload.php';

use Jsvrcek\ICS\Model\Calendar;
use Jsvrcek\ICS\Model\CalendarEvent;
use Jsvrcek\ICS\Model\CalendarAlarm;
use Jsvrcek\ICS\Model\Relationship\Attendee;
use Jsvrcek\ICS\Model\Relationship\Organizer;

use Jsvrcek\ICS\Utility\Formatter;
use Jsvrcek\ICS\CalendarStream;
use Jsvrcek\ICS\CalendarExport;
use Spatie\SimpleExcel\SimpleExcelReader;

//setup calendar
$calendar = new Calendar();
// $calendar->setProdId('-//My Company//Cool Calendar App//EN');

$sid = isset($_GET['sid']) ? $_GET['sid'] : '2PACX-1vQvqPN7XRE_QHqz5HfTuN6wCPNBxkeeLtiR_vtfyHbIN9mCgi_8DH0dnqhZJKZizKJTOG2tGkTugf--';
$gid = isset($_GET['gid']) ? $_GET['gid'] : 0;
$url = 'https://docs.google.com/spreadsheets/d/e/'.$sid.'/pub?gid='.$gid.'&single=true&output=csv';
$content = file_get_contents($url);
$path = 'csv/Team_'.$gid.'.csv';
file_put_contents($path, $content);

// $rows is an instance of Illuminate\Support\LazyCollection
$rows = SimpleExcelReader::create($path, 'csv')->getRows();
$rows->each(function(array $row) use ($calendar) {
    // in the first pass $row will contain
    // ['email' => 'john@example.com', 'first_name' => 'john']
    $startDate = isset($row['Start Date'])?$row['Start Date']:'';
    $startTime = isset($row['Start Time'])?$row['Start Time']:'';
    $endDate = isset($row['End Date'])?$row['End Date']:'';
    $endTime = isset($row['End Time'])?$row['End Time']:'';
    // new event
    $event = new CalendarEvent();
    $event->setSummary($row['Subject'])
    ->setDescription($row['Description']);
    if ($startDate || $startTime) $event->setStart(new \DateTime($startDate . ' ' . $startTime));
    if ($endDate || $endTime) $event->setEnd(new \DateTime($endDate . ' ' . $endTime));
    $event->setAllDay(strtolower($row['All Day Event']) == 'true');
    $event->setUid(md5($row['Subject']));
    // set alarm
    $alarmDisplay = new CalendarAlarm();
    $alarmDisplay->setAction("display");
    $alarmDisplay->setTrigger($event->getStart());
    // $alarmDisplay->setRepeat(1);
    // $alarmDisplay->setDuration(new \DateInterval('PT15M'));
    $alarmDisplay->setDescription("This is a team reminder for milestones.");
    $event->addAlarm($alarmDisplay);

    $calendar->addEvent($event);
});

//setup exporter
$calendarExport = new CalendarExport(new CalendarStream, new Formatter());
$calendarExport->addCalendar($calendar);

//output .ics formatted text
echo $calendarExport->getStream();