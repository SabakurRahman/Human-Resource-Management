@foreach($payrollData as $employee)
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div>
        <p style="margin-top:0pt; margin-left:170pt; margin-bottom:8pt; line-height:108%; widows:0; orphans:0; font-size:22pt;"><span style="font-family:'Times New Roman';">&nbsp;&nbsp;&nbsp;</span><span style="font-family:'Times New Roman'; text-align: center">Salary Statement </span></p>
        <p style="margin-top:0pt; margin-bottom:8pt; widows:0; orphans:0;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
        <table cellspacing="0" cellpadding="0" style="width:459.7pt; margin-left:50.65pt; border-collapse:collapse;">
            <tbody>
            <tr style="height:30.15pt;">
                <td colspan="5" style="width:447.2pt; border-style:solid; border-width:1pt; padding-right:5.25pt; padding-left:5.25pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; text-align:center; font-size:14pt;"><strong><span style="font-family:'Times New Roman';">{{$employee?->company?->name}}</span></strong></p>
                </td>
            </tr>
            <tr style="height:34.5pt;">
                <td colspan="2" style="width:164.4pt; border-top-style:solid; border-top-width:1pt; border-left-style:solid; border-left-width:1pt; padding-right:5.75pt; padding-left:5.25pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; text-align:center; font-size:12pt;"><strong><span style="font-family:'Times New Roman';">Employee#</span></strong><strong><span style="font-size:11.5pt; background-color:#ffffff;">&nbsp;{{$employee?->employee_id}}</span></strong></p>
                    <p style="margin-top:0pt; margin-bottom:8pt; text-align:center; font-size:12pt;"><strong><span style="font-family:'Times New Roman';">Name:{{$employee?->user?->name}}</p>
                </td>
                <td colspan="2" style="width:182.1pt; border-top-style:solid; border-top-width:1pt; padding-right:5.75pt; padding-left:5.75pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:11pt;"><strong><span style="font-family:'Times New Roman';">Department:{{$employee?->department?->name}}</span></strong></p>
                </td>
                <td style="width:77.65pt; border-right-style:solid; border-right-width:1pt; padding-right:5.25pt; padding-left:5.75pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                </td>
            </tr>
            <tr style="height:21.05pt;">
                <td colspan="2" style="width:164.4pt; border-left-style:solid; border-left-width:1pt; border-bottom-style:solid; border-bottom-width:1pt; padding-right:5.75pt; padding-left:5.25pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; text-align:center; font-size:12pt;"><strong><span style="font-family:'Times New Roman';">Designation:{{$employee?->designation}}</span></strong></p>
                </td>
                <td colspan="2" style="width:182.1pt; border-bottom-style:solid; border-bottom-width:1pt; padding-right:5.75pt; padding-left:5.75pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; text-align:center; font-size:11pt;"><strong><span style="font-family:'Times New Roman';">Salary for {{ \Carbon\Carbon::parse($employee->startDate)->format('F Y') }}&nbsp;</span></strong></p>
                    <p style="margin-top:0pt; margin-bottom:8pt; text-align:center; font-size:11pt;"><strong><span style="font-family:'Times New Roman';">&nbsp;</span></strong><strong><span style="font-family:'Times New Roman';">Days 3</span></strong><strong><span style="font-family:'Times New Roman'; font-size:7.33pt;"><sup>rd</sup></span></strong><strong><span style="font-family:'Times New Roman';">&nbsp;{{\Carbon\Carbon::parse($date)->format('F Y')}}</span></strong></p>
                </td>
                <td style="width:77.65pt; border-right-style:solid; border-right-width:1pt; border-bottom-style:solid; border-bottom-width:1pt; padding-right:5.25pt; padding-left:5.75pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; text-align:center; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                </td>
            </tr>
            <tr style="height:37.45pt;">
                <td style="width:98.35pt; border-right-style:solid; border-right-width:1pt; border-left-style:solid; border-left-width:1pt; padding-right:5.25pt; padding-left:5.25pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:12pt;"><strong><span style="font-family:'Times New Roman';">Pay &amp; Allowances</span></strong></p>
                </td>
                <td style="width:54.55pt; border-right-style:solid; border-right-width:1pt; padding-right:5.25pt; padding-left:5.75pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:12pt;"><strong><span style="font-family:'Times New Roman';">&nbsp;</span></strong><strong><span style="font-family:'Times New Roman';">Amounts</span></strong></p>
                    <p style="margin-top:0pt; margin-bottom:8pt; text-align:center; font-size:12pt;"><strong><span style="font-family:'Times New Roman';">(Taka)</span></strong></p>
                </td>
                <td style="width:123.75pt; border-right-style:solid; border-right-width:1pt; padding-right:5.25pt; padding-left:5.75pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:11pt;"><strong><span style="font-family:'Times New Roman';">Deductions</span></strong></p>
                </td>
                <td style="width:46.8pt; border-style:solid; border-width:0.75pt; padding-right:5.38pt; padding-left:5.38pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:11pt;"><strong><span style="font-family:'Times New Roman';">Amounts</span></strong></p>
                </td>
                <td style="width:77.65pt; border-right-style:solid; border-right-width:1pt; padding-right:5.25pt; padding-left:5.75pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:11pt;"><strong><span style="font-family:'Times New Roman';">Other Details</span></strong></p>
                </td>
            </tr>
            <tr style="height:18.7pt;">
                <td style="width:98.35pt; border-style:solid; border-width:0.75pt 0.75pt 0.75pt 1pt; padding-right:5.38pt; padding-left:5.25pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:11pt;"><span style="font-family:'Times New Roman';">Basic</span></p>
                </td>
                <td style="width:54.55pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.38pt; padding-left:5.75pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; text-align:right; font-size:11pt;"><span style="font-family:'Times New Roman';">{{$employee?->basic_total}}</span></p>
                </td>
                <td style="width:123.75pt; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.38pt; padding-left:5.75pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:11pt;"><span style="font-family:'Times New Roman';">0</span></p>
                </td>
                <td style="width:46.8pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.38pt; padding-left:5.75pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; text-align:right; font-size:11pt;"><span style="font-family:'Times New Roman';">{{$employee?->basic_total}}</span></p>
                </td>
                <td rowspan="4" style="width:77.65pt; border-style:solid; border-width:0.75pt 1pt 0.75pt 0.75pt; padding-right:5.25pt; padding-left:5.38pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:11pt;"><span style="font-family:'Times New Roman';"></span></p>
                </td>
            </tr>
            <tr style="height:18.7pt;">
                <td style="width:98.35pt; border-right-style:solid; border-right-width:0.75pt; border-left-style:solid; border-left-width:1pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.38pt; padding-left:5.25pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:11pt;"><span style="font-family:'Times New Roman';">House Rent</span></p>
                </td>
                <td style="width:54.55pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.38pt; padding-left:5.75pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; text-align:right; font-size:11pt;"><span style="font-family:'Times New Roman';">{{$employee?->house_rent}}</span></p>
                </td>
                <td style="width:123.75pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.38pt; padding-left:5.75pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:11pt;"><span style="font-family:'Times New Roman';">0</span></p>
                </td>
                <td style="width:46.8pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.38pt; padding-left:5.75pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; text-align:right; font-size:11pt;"><span style="font-family:'Times New Roman';">{{$employee?->house_rent}}</span></p>
                </td>
            </tr>
            <tr style="height:18.7pt;">
                <td style="width:98.35pt; border-right-style:solid; border-right-width:0.75pt; border-left-style:solid; border-left-width:1pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.38pt; padding-left:5.25pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:11pt;"><span style="font-family:'Times New Roman';">Medical</span></p>
                </td>
                <td style="width:54.55pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.38pt; padding-left:5.75pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; text-align:right; font-size:11pt;"><span style="font-family:'Times New Roman';">{{$employee?->medical}}</span></p>
                </td>
                <td style="width:123.75pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.38pt; padding-left:5.75pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:11pt;"><span style="font-family:'Times New Roman';">0</span></p>
                </td>
                <td style="width:46.8pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.38pt; padding-left:5.75pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt;  text-align:right; font-size:11pt;"><span style="font-family:'Times New Roman';">{{$employee?->medical}}</span></p>
                </td>
            </tr>
            <tr style="height:18.7pt;">
                <td style="width:98.35pt; border-right-style:solid; border-right-width:0.75pt; border-left-style:solid; border-left-width:1pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.38pt; padding-left:5.25pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:11pt;"><span style="font-family:'Times New Roman';">Bonus</span></p>
                </td>
                <td style="width:54.55pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.38pt; padding-left:5.75pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; text-align:right; font-size:11pt;"><span style="font-family:'Times New Roman';">0</span></p>
                </td>
                <td style="width:123.75pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.38pt; padding-left:5.75pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:11pt;"><span style="font-family:'Times New Roman';">0</span></p>
                </td>
                <td style="width:46.8pt; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.38pt; padding-left:5.75pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                </td>
            </tr>
            <tr style="height:18.7pt;">
                <td style="width:98.35pt; border-right-style:solid; border-right-width:1pt; border-left-style:solid; border-left-width:1pt; border-bottom-style:solid; border-bottom-width:1pt; padding-right:5.25pt; padding-left:5.25pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:11pt;"><strong><span style="font-family:'Times New Roman';">Gross Total</span></strong></p>
                </td>
                <td style="width:54.55pt; border-right-style:solid; border-right-width:1pt; border-bottom-style:solid; border-bottom-width:1pt; padding-right:5.25pt; padding-left:5.75pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; text-align:right; font-size:11pt;"><strong><span style="font-family:'Times New Roman';">{{$employee->gross_total}}</span></strong></p>
                </td>
                <td style="width:123.75pt; border-right-style:solid; border-right-width:1pt; border-bottom-style:solid; border-bottom-width:1pt; padding-right:5.25pt; padding-left:5.75pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:11pt;"><strong><span style="font-family:'Times New Roman';">Total DED 0;</span></strong></p>
                </td>
                <td style="width:46.8pt; border-right-style:solid; border-right-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.38pt; padding-left:5.38pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; text-align:right; font-size:11pt;"><strong><span style="font-family:'Times New Roman';">000</span></strong></p>
                </td>
                <td style="width:77.65pt; border-right-style:solid; border-right-width:1pt; border-bottom-style:solid; border-bottom-width:1pt; padding-right:5.25pt; padding-left:5.75pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; text-align:right; font-size:11pt;"><strong><span style="font-family:'Times New Roman';">000</span></strong></p>
                </td>
            </tr>
            <tr style="height:30.15pt;">
                <td colspan="3" style="width:299.7pt; border-top-style:solid; border-top-width:1pt; border-left-style:solid; border-left-width:1pt; border-bottom-style:solid; border-bottom-width:1pt; padding-right:5.75pt; padding-left:5.25pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:11pt;"><a name="_gjdgxs"></a><span style="font-family:'Times New Roman';">Salary Credited to Your Account# {{$employee?->account_number}}</span></p>
                </td>
                <td style="width:46.8pt; border-top-style:solid; border-top-width:1pt; border-bottom-style:solid; border-bottom-width:1pt; padding-right:5.75pt; padding-left:5.75pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                </td>
                <td style="width:77.65pt; border-right-style:solid; border-right-width:1pt; border-left-style:solid; border-left-width:1pt; border-bottom-style:solid; border-bottom-width:1pt; padding-right:5.25pt; padding-left:5.25pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; text-align:right; font-size:11pt;"><strong><span style="font-family:'Times New Roman';">&nbsp;</span></strong></p>
                </td>
            </tr>
            <tr style="height:33.65pt;">
                <td style="width:98.35pt; border-left-style:solid; border-left-width:1pt; border-bottom-style:solid; border-bottom-width:1pt; padding-right:5.75pt; padding-left:5.25pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:11pt;"><span style="font-family:'Times New Roman';">Bank Name</span></p>
                </td>
                <td style="width:54.55pt; border-bottom-style:solid; border-bottom-width:1pt; padding-right:5.75pt; padding-left:5.75pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:11pt;"><span style="font-family:'Times New Roman';">{{$employee->bank_name}}</span></p>
                </td>
                <td style="width:123.75pt; border-bottom-style:solid; border-bottom-width:1pt; padding-right:5.75pt; padding-left:5.75pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:11pt;"><span style="font-family:'Times New Roman';">Branch</span></p>
                </td>
                <td style="width:46.8pt; border-bottom-style:solid; border-bottom-width:1pt; padding-right:5.75pt; padding-left:5.75pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span><span style="font-family:'Times New Roman';">{{$employee->branch}}</span></p>
                </td>
                <td style="width:77.65pt; border-right-style:solid; border-right-width:1pt; border-bottom-style:solid; border-bottom-width:1pt; padding-right:5.25pt; padding-left:5.75pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                </td>
            </tr>
            <tr style="height:19.3pt;">
                <td style="width:98.35pt; padding-right:5.75pt; padding-left:5.75pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                </td>
                <td style="width:54.55pt; padding-right:5.75pt; padding-left:5.75pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                </td>
                <td style="width:123.75pt; padding-right:5.75pt; padding-left:5.75pt; vertical-align:bottom;">
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                </td>
                <td style="width:46.8pt; padding-right:5.75pt; padding-left:5.75pt; vertical-align:bottom;">
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                </td>
                <td style="width:77.65pt; padding-right:5.75pt; padding-left:5.75pt; vertical-align:bottom;">
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                </td>
            </tr>
            <tr style="height:13.45pt;">
                <td style="width:98.35pt; padding-right:5.75pt; padding-left:5.75pt; vertical-align:bottom;">
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>
                </td>
                <td style="width:54.55pt; padding-right:5.75pt; padding-left:5.75pt; vertical-align:bottom;">
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                </td>
                <td style="width:123.75pt; padding-right:5.75pt; padding-left:5.75pt; vertical-align:bottom;">
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                </td>
                <td style="width:46.8pt; padding-right:5.75pt; padding-left:5.75pt; vertical-align:bottom;">
                    <p style="margin-top:0pt; margin-bottom:8pt; font-size:11pt;"><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                </td>
                <td style="width:77.65pt; padding-right:5.75pt; padding-left:5.75pt; vertical-align:bottom;">
                    <div style="width:100%; height:13.45pt; display:inline-block; overflow:visible;">
                        <p style="margin-top:0pt; margin-bottom:8pt; font-size:11pt;"><span style="height:0pt; display:block; position:absolute; z-index:2;"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAKYAAAAECAYAAAAEXESSAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAAnSURBVEhLYwCC/6OYangUjIJBCbAl1lFMOh4Fo2AUjIJRQCRgYAAAxAykXKHv2yYAAAAASUVORK5CYII=" width="166" height="4" alt="" style="margin: 0 0 0 auto; display: block; "></span><span style="font-family:'Times New Roman';">&nbsp;</span></p>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:8pt; text-align:justify;"><span style="height:0pt; text-align:left; display:block; position:absolute; z-index:0;"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIYAAAACCAYAAACdWKRfAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAAXSURBVDhPYwCC/6N4FCPhUTAKcAEGBgAb44N9wv5qmAAAAABJRU5ErkJggg==" width="134" height="2" alt="" style="margin: 0 auto 0 0; display: block; "></span><span style="height:0pt; text-align:left; display:block; position:absolute; z-index:1;"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAKQAAAACCAYAAADW8HeyAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAAYSURBVDhPYwCC/6N4FA8SPApGwWACDAwAg/OiXhCKczYAAAAASUVORK5CYII=" width="164" height="2" alt="" style="margin: 0 0 0 auto; display: block; "></span><span style="font-family:'Times New Roman';">&nbsp;</span></p>
        <p style="margin-top:0pt; margin-bottom:8pt; text-align:justify;"><span style="font-family:'Times New Roman';">&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="font-family:'Times New Roman';">Accountant</span><span style="font-family:'Times New Roman';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="font-family:'Times New Roman';">Chief Operating Officer</span><span style="font-family:'Times New Roman';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="font-family:'Times New Roman';">Chief Executive Officer</span></p>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
@endforeach



