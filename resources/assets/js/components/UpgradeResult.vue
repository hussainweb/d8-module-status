<template>
    <div>
        <h2>You are {{ this.percentage }}% ready for Drupal 8</h2>
        <project-section
            section-id="stable"
            title="Stable Projects"
            :total-count="this.totalProjects"
            :projects="this.stableProjects">
        </project-section>
        <project-section
            section-id="others"
            title="Other Releases"
            :total-count="this.totalProjects"
            :projects="this.otherProjects">
        </project-section>
        <project-section
            section-id="absent"
            title="Missing Projects (not yet ported)"
            :total-count="this.totalProjects"
            :projects="this.absentProjects">
        </project-section>
        <project-section
            section-id="unknown"
            title="Unknown Projects (probably custom modules)"
            :total-count="this.totalProjects"
            :projects="this.unknownProjects">
        </project-section>
    </div>
</template>

<script>
    export default{
        data() {
            return {
                projectStatus: []
            }
        },
        props: ['results'],
        computed: {
            percentage: function () {
                if (typeof this.results.projects_count === 'undefined') {
                    return 0;
                }

                var count = this.results.stable_count + (this.results.others_count / 2);
                return (count / this.results.projects_count * 100).toFixed(0);
            },

            totalProjects: function () {
                return this.results.projects_count;
            },

            stableProjects: function () {
                return typeof this.results.projects.stable !== 'undefined' ? this.results.projects.stable : [];
            },

            unknownProjects: function () {
                return typeof this.results.projects.unknown !== 'undefined' ? this.results.projects.unknown : [];
            },

            absentProjects: function () {
                return typeof this.results.projects.absent !== 'undefined' ? this.results.projects.absent : [];
            },

            otherProjects: function () {
                var others = [];
                for (var type in this.results.projects) {
                    if (type != 'stable' && type != 'unknown' && type != 'absent') {
                        others = others.concat(this.results.projects[type]);
                    }
                }
                return others;
            }
        }
    }
</script>
