@extends('layout.app')
@section('content')
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
<style>
    td{
        background-color:#161A1D;
        color:#fff;
    }
    label,th,.dataTables_info{
        color:#fff !important;
    }
    .paginate_button,.disabled,.previous,.next{
        color:#fff !important;
    }
</style>
<div class="flex flex-col h-screen container">
    <div class="flex mt-20">
        <button data-bs-toggle="modal" data-bs-target="#exampleModal"
        type="button"  class="bg-[#111] text-white border border-solid px-3 py-1 flex items-center justify-center">Create</button>
    </div>
    <div class="mt-5">
        <div class="w-full">
            <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-[#161A1D]">
                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th data-priority="1">Project Title</th>
                            <th data-priority="2">Project Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projectDetail as $data)
                            <tr>
                                <td>
                                    <a href="issue/{{$data['project_name']}}/{{$data['id']}}">{{ $data['project_name'] }}</a>
                                </td>
                                <td>{{ $data['project_type'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="create" method="post" class="modal-dialog modal-dialog-centered">
            @csrf
            <div class="modal-content bg-[#161A1D]">
            <div class="modal-header">
                <h1 class="modal-title fs-5 !text-white" id="exampleModalLabel">Create Project</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="flex flex-col gap-3">
                    <div class="flex flex-col gap-1">
                        <label for="title">Project Title</label>
                        <input type="text" name="projTitle" class="bg-[#111] text-white px-3 py-1">
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="title">Project Type</label>
                        <input type="text" name="projType" class="bg-[#111] text-white px-3 py-1">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
            </div>
        </form>
    </div>

</div>
@endsection
