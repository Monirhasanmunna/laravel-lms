@extends('admin.layouts.app')
@push('css')
    <style>
        .activebtn{
            background-color: #0070B4;
            color:white;
        }
    </style>
@endpush
@section('content')
<div class="main-panel">
    @include($adminTemplate.'.attendance.partials.attendancenav')
    <div class="content-wrapper">

        <div class="mb-3" style="margin-left:48px;">
            <ul class="nav nav-tabs" style="border:none">
                <li class="nav-item mr-1">
                    <a class="nav-link bg-primary py-2" id="teacherBtn" data-toggle="tab" href="#teacher">Teacher</a>
                </li>
                <li class="nav-item mr-1">
                    <a class="nav-link bg-primary py-2" id="studentBtn" data-toggle="tab" href="#student">Student</a>
                </li>
            </ul>
        </div>

        <div class="tab-content">
            <div id="teacher" class=" tab-pane active">
                <div class="card new-table">
                    <div class="card-header">
                        <div class="card-title float-left">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5);margin-left:15px;">Teacher
                                        Approved Application's</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table id="customTable1" class="table table-striped table-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th> Date </th>
                                    <th> Teachers/Staff Name </th>
                                    <th> Designation </th>
                                    <th> Application </th>
                                    <th> Leave Date </th>
                                    <th> Total Day </th>
                                    <th> Status </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teacherapplications as $key => $application)
                                <td>{{date('d-M-y',strtotime($application->created_at))}}</td>
                                <td>{{$application->source->teacher->name}}</td>
                                <td>{{$application->source->teacher->designation->title}}</td>
                                <td>{{Str::words($application->application,5,'..')}}</td>
                                <td>
                                    {{date('d-M-y',strtotime($application->to_date)).' to '.date('d-M-y',strtotime($application->from_date))}}
                                </td>
                                <td>{{$application->total_day}}</td>
                                <td>
                                    @if ($application->status == 'approve')
                                    <span class="badge badge-sm badge-info">Approved</span>
                                    @endif
                                </td>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>


            <div id="student" class=" tab-pane">
                <div class="card new-table">
                    <div class="card-header">
                        <div class="card-title float-left">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4 class="card-title" style="color:rgba(0, 0, 0, 0.5);margin-left:15px;">Student's
                                        Approved Application's</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table id="customTable2" class="table table-striped table-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th> Date </th>
                                    <th> Students ID </th>
                                    <th> Students Name </th>
                                    <th> Roll </th>
                                    <th> Class/Section/Group</th>
                                    <th> Application </th>
                                    <th> Leave Date </th>
                                    <th> Total Day </th>
                                    <th class='text-center'> Status </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($studentapplications as $key => $application)
                                <tr>
                                    <td>{{date('d-M-y',strtotime($application->created_at))}}</td>
                                    <td>{{$application->source->student->id_no}}</td>
                                    <td>{{$application->source->student->name}}</td>
                                    <td>{{$application->source->student->roll_no}}</td>
                                    <td>{{$application->source->student->ins_class->name}} -
                                        {{$application->source->student->section->name}} -
                                        {{$application->source->student->group->name}}</td>
                                    <td>{{Str::words($application->application,5,'..')}}</td>
                                    <td>
                                        {{date('d-M-y',strtotime($application->to_date)).' to '.date('d-M-y',strtotime($application->from_date))}}
                                    </td>
                                    <td>{{$application->total_day}}</td>
                                    <td>
                                        @if ($application->status == 'approve')
                                        <span class="badge badge-sm badge-info">Approved</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script>
    $(document).ready(function () {
        $('#customTable1').DataTable();
    });

    $(document).ready(function () {
        $('#customTable2').DataTable();
    });


    $(".manageLeave").closest('li').addClass('custom_nav');
    $('.setting').closest('li').removeClass('custom_nav');
    $('.addtemplate').removeClass('custom_nav');
    $('.approve-list').addClass('custom_nav');
    $('.report').closest('li').removeClass('custom_nav');
    $("#leave-item").removeClass('d-none');
    $("#setting-item").addClass('d-none');
    $("#report-item").addClass('d-none');

</script>
@endpush
