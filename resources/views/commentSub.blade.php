<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Comments') }}
        </h2>
    </x-slot>

    <div class="panel-body">
        <!-- Display Validation Errors -->
        <!-- @include('common.errors') -->

        <!-- New Comment Form -->
        <form action="/comment" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="comment" class="col-sm-3 control-label">Comment</label>

                <div class="col-sm-6">
                    <input type="comment" name="name" id="comment-name" class="form-control">
                </div>
            </div>

            <!-- Add Commment Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Post Comment
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Current Comments -->
    @if (count($comments) > 0)
    <div class="panel panel-default">
        <div class="panel-heading">
            Current Tasks
        </div>

        <div class="panel-body">
            <table class="table table-striped task-table">

                <!-- Table Headings -->
                <thead>
                    <th>Task</th>
                    <th>&nbsp;</th>
                </thead>

                <!-- Table Body -->
                <tbody>
                    @foreach ($comments as $comment)
                    <tr>
                        <!-- Task Name -->
                        <td class="table-text">
                            <div>{{ $comment->name }}</div>
                        </td>

                        <!-- Delete Button -->
                        <td>
                            <form action="/comment/{{ $comment->id }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button>Delete Task</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

    <div class="ml-12">
        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
            <a href="https://laravel.bigcartel.com" class="ml-1 underline">
                User infomationm
            </a>
        </div>
    </div>

</x-app-layout>