@extends('admin/index')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading" style="color: red; font-size: 24px;">
               Trả lời phản hồi
            </header>
            <div class="panel-body">
                @if(session()->has('message'))
                    <h5 class="text-alert">{{ session('message') }}</h5>
                @endif
                <div class="position-center">
                    <form role="form" action="{{ route('update_contact', ['contact_id' => $edit_contact->contactid]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="contact_name">Tên</label>
                            <input type="text" name="contact_userid" class="form-control" id="contact_userid" value="{{ $edit_contact->userid }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="contact_subject">Tiêu đề</label>
                            <input type="text" name="contact_subject" class="form-control" id="contact_subject" value="{{ $edit_contact->subject }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="contact_message">Nội dung</label>
                            <input type="text" name="contact_message" class="form-control" id="contact_message" value="{{ $edit_contact->message }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="contact_contact_time">Thời gian gửi</label>
                            <input type="datetime-local" name="contact_contact_time" class="form-control" id="contact_contact_time" value="{{ $edit_contact->contact_time }}" readonly>
                        </div>
                        <div class="form-group" style="font-weight: bold; color: #ff0000; background-color: #fce4e4; padding: 10px; border: 2px solid #ff0000; border-radius: 5px;">
                            <label for="contact_status">Trạng thái</label>
                            <input 
                                type="text" 
                                name="contact_status" 
                                class="form-control" 
                                id="contact_status" 
                                value="{{ $edit_contact->status }}" 
                                >
                                {{-- readonly --}}
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="contact_response">Nội dung phản hồi</label>
                            <input type="text" name="contact_response" class="form-control" id="contact_response" value="{{ $edit_contact->response }}">
                        </div>
                        <div class="form-group">
                            <label for="contact_response_time">Thời gian phản hồi</label>
                            <input type="datetime-local"  name="contact_response_time" class="form-control" id="contact_response_time" value="{{ $edit_contact->response_time }}">
                        </div>
                        
                        <button type="submit" name="all_contact" class="btn btn-info">Cập nhật</button>
                    </form>
                </div>
                
            </div>
        </section>
    </div>
</div>
@endsection   