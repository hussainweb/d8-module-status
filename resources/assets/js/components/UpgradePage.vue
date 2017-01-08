<template>
    <div>
        <upgrade-input-form
            :module-status-url="this.moduleStatusUrl"
            @onResults="updateResults"
            @onError="errorHandle">
        </upgrade-input-form>
        <upgrade-result :results="this.projectUpgradeResults" v-if="typeof this.projectUpgradeResults.projects_count !== 'undefined'"></upgrade-result>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                projectUpgradeResults: {}
            };
        },
        props: ['moduleStatusUrl'],
        methods: {
            updateResults: function (results, list) {
                this.projectUpgradeResults = results;
            },
            errorHandle: function (errorMsg) {
                this.projectUpgradeResults = {};
                alert(errorMsg);
            }
        },
        mounted() {
            console.log('Component ready.')
        }
    }
</script>
