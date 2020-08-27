@extends('layouts.app')

@section('css')
<style>
    .thought-card {
        max-width: 20rem;
        height: 14rem;
    }

    .edit-thought,
    .delete-thoght {
        cursor: pointer;
    }

    form label.required:after {
        color: red;
        content: "*";
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="alert alert-success d-none">
        <span class="message"></span>
    </div>

    <div class="alert alert-danger d-none">
        <span class="message"></span>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card rounded">
                <div class="card-header">{{ Auth::user()->name }}{{ __('\'s Thoughts List') }}
                    <button type="button" id="btn-add-new" class="btn btn-success btn-sm rounded float-right">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Add New Thought
                    </button>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="row justify-content-center" id="thoughts-list">
                        @foreach($thoughts as $t)
                        <div class="col-4 thought-{{$t['id']}}">
                            <div class="card thought-card border-light m-3 shadow rounded">
                                <div class="card-body">
                                    <div class="pull-right" data-thought-id="{{$t['id']}}">
                                        <a href="javascript:void(0)" class="edit-thought" title="Edit">
                                            <i class="fa fa-edit fa-lg text-info" aria-hidden="true"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="delete-thought" title="Delete">
                                            <i class="fa fa-trash fa-lg text-danger" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <h4 class="card-title">{{$t['title']}}</h4>
                                    <p class="card-text">{{ FormatThought::trim($t['thought']) }}</p>
                                </div>
                                <div class="card-footer text-right">- {{ $t['said_by']}}</div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal')
<div class="modal" id="add-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Thought</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="thought-form" method="post">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" class="thought_id" name="thought_id">
                    <div class="form-group">
                        <label for="title" class="required">Title</label>
                        <input type="text" class="form-control title" name="title" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="thought" class="required">Thought</label>
                        <textarea class="form-control thought" name="thought" rows="3" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="said_by" class="required">Name of the thought initiator</label>
                        <input type="text" class="form-control said_by" name="said_by" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-spinner fa-spin d-none"></i> Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
