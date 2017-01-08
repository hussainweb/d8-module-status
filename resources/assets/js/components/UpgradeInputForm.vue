<template>
    <form name="modules" method="post" :action="this.moduleStatusUrl" @submit.prevent="sendModuleList()">
        <div class="form-group">
            <label for="list">Modules:</label>
            <textarea name="list" v-model="list" class="form-control" rows="10" placeholder="Paste output from `drush pm-list --format=json` here"></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Can I upgrade?</button>
    </form>
</template>

<script>
    export default{
        data() {
            return {
                list: ''
            }
        },
        props: ['moduleStatusUrl'],
        methods: {
            sendModuleList: function () {
                if (this.list == '') {
                    this.$emit('onError', 'Please list all modules on your site. Tip: Run `drush pm-list --format=json` and paste the output here.');
                    return;
                }

                $.ajax({
                    type: 'POST',
                    url: this.moduleStatusUrl,
                    data: {
                        list: this.list
                    }
                })
                    .done((data, textStatus, jqXHR) => {
                        this.$emit('onResults', data, this.list);
                    })
                    .fail((jqXHR, textStatus, errorThrown) => {
                        var errorMsg = 'Error: ' + errorThrown + '. Please check the format and try again. Status Code: ' + jqXHR.status;
                        if (typeof jqXHR.responseJSON !== 'undefined') {
                            errorMsg += "\n" + jqXHR.responseJSON.error;
                        }
                        this.$emit('onError', errorMsg);
                    });
            }
        }
    }
</script>
