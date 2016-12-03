@extends('layouts.master')

@section('content')
    <div class="content">
        <div class="title">{{ $title }}</div>
    </div>
    <div class="col-sm-12" id="main-form">
        <form name="modules" method="post" action="{{ url('/api/module_status') }}" @submit.prevent="sendModuleList()">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="list">Modules:</label>
                <textarea name="list" v-model="list" class="form-control" rows="10" placeholder="Paste output from `drush pm-list --format=json` here"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Can I upgrade?</button>
        </form>
    </div>
@endsection

@push('scripts')
<script type="text/javascript">
    var app = new Vue({
        el: '#main-form',
        data: {
            list: ''
        },
        methods: {
            sendModuleList: function () {
                if (this.list == '') {
                    alert('Please list all modules on your site. Tip: Run `drush pm-list --format=json` and paste the output here.');
                }

                $.ajax({
                    type: 'POST',
                    url: '{{ url('/api/module_status') }}',
                    data: {
                        list: this.list
                    }
                })
                    .done(function (data, textStatus, jqXHR) {
                        console.log(data);
                        console.log(textStatus);
                    })
                    .fail(function (jqXHR, textStatus, errorThrown) {
                        var errorMsg = 'Error: ' + errorThrown + '. Please check the format and try again. Status Code: ' + jqXHR.status;
                        if (typeof jqXHR.responseJSON !== 'undefined') {
                            errorMsg += "\n" + jqXHR.responseJSON.error;
                        }
                        alert(errorMsg);
                    });
            }
        }
    });
</script>
@endpush
