@extends('layout.app')
@section('content')
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
    <div class="mt-5 text-white">
        <div>
            <div class="text-white">
                Projects / {{$projTitle}}
            </div>
            <div class="grid grid-cols-3 gap-3 max-sm:grid-cols-1 mt-4">
                @foreach($issues as $issueData)
                <div class="flex flex-col gap-3 px-3 py-2 border border-solid rounded-lg">
                    <div class="font-bold text-2xl">{{ $issueData['issue_title'] }}</div>
                    <div>
                        <p class="text-sm text-[#B6C2CF]">Description:</p>
                        {{$issueData['issue_desc'] }}
                    </div>
                    <div class="flex items-center gap-2">
                        <p class="text-[#B6C2CF] text-sm">Priority:</p>
                        <p>{{ $issueData['issue_priority'] }}</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <p class="text-[#B6C2CF] text-sm">Assignee:</p>
                        <p>{{ $issueData['issue_assign'] }}</p>
                    </div>
                    <div class="flex flex-col gap-2">
                        <p class="text-[#B6C2CF] text-sm">Attachments:</p>
                        @if(Str::endsWith($issueData['issue_attachment'],['.jpg', '.jpeg', '.png']))
                            <img src="{{ asset('attachments/' . $issueData['issue_attachment']) }}" class="object-cover w-full h-[200px]">
                        @elseif(Str::endsWith($issueData['issue_attachment'],['.pdf', '.docx']))
                            <a href="{{ asset('attachments/' . $issueData['issue_attachment']) }}"class="underline font-bold">File</a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="{{$projId}}" method="POST" class="modal-dialog modal-dialog-centered" enctype="multipart/form-data">
            @csrf
            <div class="modal-content bg-[#161A1D]">
            <div class="modal-header">
                <h1 class="modal-title fs-5 !text-white" id="exampleModalLabel">Create Issue</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="flex flex-col gap-3">
                    <div>
                        <input type="hidden" name="userProj_id" value="{{$projId}}"/>
                        <input type="hidden" name="userProj_title" value="{{$projTitle}}"/>
                        
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="title">Issue Title</label>
                        <input type="text" name="issueTitle" class="bg-[#111] text-white px-3 py-1">
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="title">Issue Description</label>
                        <textarea rows="3" name="issuedesc" class="bg-[#111] text-white px-3 py-1"></textarea>
                    </div>
                    <select class="form-select bg-[#111] text-white" name="priority" aria-label="Default select example">
                        <option selected>Set Priority</option>
                        <option value="high">high</option>
                        <option value="medium">medium</option>
                        <option value="low">low</option>
                    </select>
                    <select class="form-select bg-[#111] text-white" name="assignee" aria-label="Default select example">
                        <option selected>Unassignee</option>
                        @foreach($assigneeName as $names)
                            <option value="{{ $names['name'] }}">{{ $names['name'] }}</option>
                        @endforeach
                    </select>
                    <input type="file" name="attachment" class="bg-[#111] text-white" />
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
