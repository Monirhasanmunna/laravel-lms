<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    {{-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Teacher List</title>

</head>

<style>
    

    body {
        font-family: "Nikosh"
    }

    ,


    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;

    }

    .table1 {
        margin-top: 0px;
        margin-bottom: 5px;
    }

    .student-img {
        margin-right: 35px;
        object-fit: cover;
    }

    @media (max-width:515px) {
        .student-img {
            margin-right: 10px;
            width: 90px !important;
            height: 90px !important;
        }
    }

    td.tb-td-1 {
        font-size: 17px;
        line-height: 28px;
        color: #3b4a54;
        font-weight: 400;
        width: 25%;

    }

    td.tb-td-2 {
        padding: 0 20px;
        font-size: 17px;
        line-height: 28px;
        color: #3b4a54;
        font-weight: 400;
        width: 25%;

    }

    td.tb-td-father-name {
        font-size: 17px;
        line-height: 28px;
        color: #3b4a54;
        font-weight: 400;
        width: 25%;

    }

    td.father {
        padding: 0 20px;
        font-size: 17px;
        line-height: 28px;
        color: #3b4a54;
        font-weight: 400;
        width: 25%;

    }

    td.class {
        font-size: 17px;
        line-height: 28px;
        padding: 0 20px;
        color: #3b4a54;
        font-weight: 400;
        width: 25%;

    }

    td.six {
        font-size: 17px;
        line-height: 28px;
        color: #3b4a54;
        font-weight: 400;
        width: 25%;

    }

    td.mother {
        font-size: 17px;
        padding: 0 20px;
        line-height: 28px;
        color: #3b4a54;
        font-weight: 400;
        width: 25%;

    }

    td.mother-name {
        font-size: 17px;
        line-height: 28px;
        color: #3b4a54;
        font-weight: 400;
        width: 25%;

    }

    td.session {
        font-size: 17px;
        padding: 0 20px;
        line-height: 28px;
        color: #3b4a54;
        font-weight: 400;
        width: 25%;

    }

    td.year {
        font-size: 17px;
        line-height: 28px;
        color: #3b4a54;
        font-weight: 400;
        width: 25%;
        /* display: flex; */
        /* align-items: center; */
        gap: 5px;

    }

    span.span-1 {
        color: black;
    }

    td.contact {
        font-size: 17px;
        line-height: 28px;
        color: #3b4a54;
        font-weight: 400;
        width: 25%;

    }

    td.dot {
        font-size: 17px;
        padding: 0 20px;
        line-height: 28px;
        color: #3b4a54;
        font-weight: 400;
        width: 25%;

    }

    @media (max-width:1020px) {
        section#section {
            padding: 0 5px
        }
    }

    /* @media print {
        thead {
            display: table-header-group;
        }
    } */

    thead th {
        position: sticky;
        top: 0;
        background-color: #f2f2f2;
    }
</style>

<body>
    <div style="width:1100px; margin: auto;padding:0px 10px;margin-bottom:10px;margin-top:10px;height:auto;">
        <table style="width: 100%;">
            <tr>
                <td style="width: 45px;height: auto;padding-bottom:5px;"><img style="width: 100%;" src="{{@Helper::academic_setting()->image ? Config::get('app.s3_url').Helper::academic_setting()->image : asset('logo.jpg')}}"></td>
                <td style="">
                    <table style="width: 100%;padding-bottom:2px;">
                        @php
                        $stringNumber = Str::length(@Helper::academic_setting()->school_name );
                        @endphp
                        <tr>
                            <td colspan="3" style="text-align: center;font-weight: 600;color:green;text-transform: uppercase;
                                    @if($stringNumber > 30 && $stringNumber < 40)
                                    font-size: 23px;
                                    padding-right: 85px;
                                    @elseif($stringNumber > 40)
                                    font-size: 18px;
                                    padding-right: 85px;
                                    @else
                                    font-size: 24px;
                                    padding-right: 60px;
                                    @endif
                                    ">{{@Helper::academic_setting()->school_name}}</td>
                        </tr>
                        <tr>
                            <td colspan="3" style=" width: 200px; text-align: center;padding-top:5px;text-transform: uppercase;color:black;padding-bottom:5px;
                                        @if($stringNumber > 40)
                                            font-size: 10px;
                                            padding-right: 85px;
                                        @else
                                            font-size: 11px;
                                            padding-right: 60px;
                                        @endif
                                    ">{{@Helper::school_info()->address}}</td>
                        </tr>
                        <tr>
                            <td colspan="3" style="width: 200px; text-align: center;padding-top:5px;text-transform: uppercase;color:black;padding-bottom:5px;padding-right: 60px;font-size:13px;">Total: {{$teachers->count()}}</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="5" style="text-align: center;padding: 5px ;"> <span
                        style="padding: 6px 30px; background-color: white; color: #000;font-size: 14px;font-weight: 600;text-transform: uppercase;border: 1px solid #1e2023;">Teacher List</span> </td>
            </tr>
        </table>


        <table style="width: 100%;margin-top:7px;">
            <tr>
                <td>
                    <table
                        style="width: 100%;border: 1px dotted;border-collapse: collapse;text-align:center;padding-right: 3px;">
                        <thead>
                            <tr>
                                <td
                                    style="border: 1px dotted #000000;text-transform: uppercase;background-color:#d8d8d8;padding:1px;font-size:15px;">
                                    Image</td>
                                <td
                                    style="border: 1px dotted #000000 ;text-transform: uppercase;background-color: #d8d8d8; padding:1px;font-size:15px;">
                                    ID</td>
                                <td
                                    style="border: 1px dotted #000000;text-transform: uppercase;background-color:#d8d8d8; padding:1px;font-size:15px;">
                                    Name</td>
                                <td
                                    style="border: 1px dotted #000000;text-transform: uppercase;background-color:#d8d8d8;padding:1px;font-size:15px;">
                                    Designation</td>
                                <td
                                    style="border: 1px dotted #000000 ;text-transform: uppercase;background-color: #d8d8d8; padding:1px;font-size:15px;">
                                    Gender</td>
                                <td
                                    style="border: 1px dotted #000000;text-transform: uppercase;background-color:#d8d8d8; padding:1px;font-size:15px;">
                                    Religion</td>
                                <td
                                    style="border: 1px dotted #000000;text-transform: uppercase;background-color:#d8d8d8; padding:1px;font-size:15px;">
                                    DOB</td>
                                <td
                                    style="border: 1px dotted #000000;text-transform: uppercase;background-color:#d8d8d8; padding:1px;font-size:15px;">
                                    B/G</td>
                                <td
                                    style="border: 1px dotted #000000;text-transform: uppercase;background-color:#d8d8d8; padding:1px;font-size:15px;">
                                    Index</td>
                                <td
                                    style="border: 1px dotted #000000;text-transform: uppercase;background-color:#d8d8d8; padding:1px;font-size:15px;">
                                    NID</td>
                                <td
                                    style="border: 1px dotted #000000;text-transform: uppercase;background-color:#d8d8d8; padding:1px;font-size:15px;">
                                    Joining</td>
                                <td
                                    style="border: 1px dotted #000000;text-transform: uppercase;background-color:#d8d8d8; padding:1px;font-size:15px;">
                                    Mobile</td>
                            </tr>
                        </thead>
                        {{-- {{dd($committies)}} --}}
                        <tbody>
                            @foreach ($teachers as $key => $teacher)
                            <tr style="border:1px dotted #000000;">
                                <td align="center" style="border:1px dotted #000000; border-bottom:1px dotted #000000;padding-top:2px;padding-bottom:2px;font-size:15px;"><img style="width:30px;" src="{{@$teacher->image ? Config::get('app.s3_url').$teacher->photo : Helper::default_image() }}" alt="" srcset=""></td>
                                <td align="center" style="border:1px dotted #000000; border-bottom:1px dotted #000000;padding-top:2px;padding-bottom:2px;font-size:15px;">{{@$teacher->id_no}}</td>
                                <td align="center" style="border:1px dotted #000000; border-bottom:1px dotted #000000;padding-top:2px;padding-bottom:2px;font-size:15px;">{{@$teacher->name}}</td>
                                <td align="center" style="border:1px dotted #000000; border-bottom:1px dotted #000000;padding-top:2px;padding-bottom:2px;font-size:15px;">{{@$teacher->designation->title}}</td>
                                <td align="center" style="border:1px dotted #000000; border-bottom:1px dotted #000000;padding-top:2px;padding-bottom:2px;font-size:15px;">{{ucfirst(@$teacher->gender)}}</td>
                                <td align="center" style="border:1px dotted #000000; border-bottom:1px dotted #000000;padding-top:2px;padding-bottom:2px;font-size:15px;">{{@$teacher->religion}}</td>
                                <td align="center" style="border:1px dotted #000000; border-bottom:1px dotted #000000;padding-top:2px;padding-bottom:2px;font-size:15px;">{{@$teacher->date_of_birth}}</td>
                                <td align="center" style="border:1px dotted #000000; border-bottom:1px dotted #000000;padding-top:2px;padding-bottom:2px;font-size:15px;">{{@$teacher->blood_group}}</td>
                                <td align="center" style="border:1px dotted #000000; border-bottom:1px dotted #000000;padding-top:2px;padding-bottom:2px;font-size:15px;">{{@$teacher->uuid}}</td>
                                <td align="center" style="border:1px dotted #000000; border-bottom:1px dotted #000000;padding-top:2px;padding-bottom:2px;font-size:15px;">{{@$teacher->nid}}</td>
                                <td align="center" style="border:1px dotted #000000; border-bottom:1px dotted #000000;padding-top:2px;padding-bottom:2px;font-size:15px;">{{@$teacher->joining_date}}</td>
                                <td align="center" style="border:1px dotted #000000; border-bottom:1px dotted #000000;padding-top:2px;padding-bottom:2px;font-size:15px;">{{@$teacher->mobile_number}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>
        
        <table style="width:100%;padding-right:3px;margin-top: 20px;">
            <tr>
                <td></td>
                <td style="padding-left:880px;text-align:center;"><img style="width:80px;"
                        src="{{@Helper::academic_setting()->signImage ? Config::get('app.s3_url').Helper::academic_setting()->signImage : asset('signature.png')}}"
                        alt=""></td>
            </tr>
            <tr>
                <td style="padding-left:30px;"></td>
                <td style="padding-left:880px;text-align:center;">----------------</td>
            </tr>
            <tr>
                <td style="padding-left:30px;"></td>
                <td style="padding-left:880px;text-align:center;font-size:15px;">{{@Helper::academic_setting()->signText}}</td>
            </tr>
        </table>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>
