csv2ics
===

`csv2ics` is a tool for an approach to transfer google sheet dates into calendar events.

## Usage

1. Create a google sheet with your dates by following the template below. Or import data from other sheet as the template.

https://docs.google.com/spreadsheets/d/1VFP-t9E7kzGk_-zutRQAIqJxdYGbbAJMgdxrwzW4HuI/edit#gid=1382885066

2. Publish the sheet as csv file to get as the link below.

File -> Share -> Publish to Web

`https://docs.google.com/spreadsheets/d/e/2PACX-1vScttckt69huYmeZR1IvHh_dI-yBQ2hUvcd3Q3Q5YYmL3Yy-mZgS3p-QCKZQ5Sle0ogWM6WKikAE6BV/pub?gid=1382885066&single=true&output=csv`

Now you can get sid: `2PACX-1vScttckt69huYmeZR1IvHh_dI-yBQ2hUvcd3Q3Q5YYmL3Yy-mZgS3p-QCKZQ5Sle0ogWM6WKikAE6BV`, and gid: `1382885066`

3. Deploy this repo as http://yourdomain.com, you can get the ics link.

`http://yourdomain.com/?sid=${sid}&gid=${gid}`

## Reference
 
 * https://wiki.ringcentral.com/display/RI/Try+a+demo+for+Project+Timeline

## Credits

 * Esone Qiu at [ee01](https://github.com/ee01).

## License

The MIT License (MIT)

Copyright (c) 2022 Justin Svrcek

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
