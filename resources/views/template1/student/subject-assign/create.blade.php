@extends('admin.layouts.app')

@section('content')
    <div class="main-panel">
        @include($adminTemplate.'.student.studentnav')
        <div>
            <div class="card new-table">
                <div class="card">
                    <div class="card-header">
                        <h6 class="float-left">Student Subject Reassign</h6>
                        <a href="{{route('student.subject-assign.index')}}" class="btn btn-dark float-right"><i class="fa fa-arrow-left"></i>Back</a>
                    </div>
                    <div class="card-body">

                        <form id="student-form" method="GET">
                            @include('custom-blade.search-student')
                        </form>
                    </div>
                </div>

                <div class="card d-none" id="std-card">
                    <div class="card-body">
                        <form action="{{route('student.subject-assign.store')}}" method="POST">
                            @csrf
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Roll</th>
                                @foreach($subjectTypes as $type)
                                    <th>{{$type->name}} Subject</th>
                                @endforeach
                            </tr>
                            </thead>

                            <tbody>
                            </tbody>
                        </table>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-arrow-circle-up"></i>Update</button>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@push('js')
    <script>
        $(document).ready(function() {

            $('#session_id').attr("required", "true");
            $('#section_id').attr("required", "true");

            var loader = `<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin:auto;background:#fff;display:block;" width="31px" height="31px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                            <circle cx="50" cy="50" fill="none" stroke="#e15b64" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
                                <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
                            </circle>
                          </svg>`;
            $('#student-form').submit(function(e) {
                e.preventDefault();
                var form = $(this);
                var class_id = $("#class_id").val();

                var url = "{{ route('student.get-students-with-subjects') }}";
                $('#preload').html(loader);

                $.ajax({
                    type: 'GET',
                    url: url,
                    data: form.serialize(),
                    contentType: false,
                    processData: false,
                    success:function (data){
                        console.log(data);
                        let html = '';

                        $.each(data.students,function (i,v){
                            $("#std-card").removeClass('d-none');
                            //subjects types
                            let trow = '';
                            $.each(data.subjectTypes,function (index,value){
                                let subjectList = '';

                                if(value.length > 0){
                                    $.each(value,function (idx,val){

                                        subjectList += `<div class="form-check">
                                                          <input class="form-check-input" ${isChecked(val.id,v.id) === true ? 'checked':''}   name="class_subject_id-${v.id}[]" value="${val.id}" type="checkbox" value="" id="class_subject_id-${val.id}-${v.id}">
                                                          <label class="form-check-label" for="class_subject_id-${val.id}-${v.id}">
                                                            ${val.subject.sub_name}
                                                          </label>
                                                        </div>`;
                                    });
                                    trow += `<td> ${subjectList}</td>`;
                                }
                                else{
                                    trow += `<td> No Subject Found</td>`;
                                }

                            });

                            html += `<tr>
                                        <input type="hidden" name="student_id[]" value="${v.id}" >
                                        <td>${v.name}</td>
                                        <td>${v.roll_no}</td>
                                        ${trow}
                                    </tr>`;
                        });

                        $('tbody').html(html);
                    }
                });
            });

            function isChecked(classSubjectId,studentId){


                $.get("{{route('student.get-subject-checked')}}",{
                    class_subject_id:classSubjectId,
                    student_id:studentId
                },function (data){
                    if(data == 1){
                       $(`#class_subject_id-${classSubjectId}-${studentId}`).prop('checked',true);
                       $(`#class_subject_id-${classSubjectId}-${studentId}`).prop('disabled',true);
                    }
                });



            }
        });
    </script>
@endpush
