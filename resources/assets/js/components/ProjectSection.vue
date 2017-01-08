<template>
    <div>
        <table :class="['projects-section', 'projects-section-' + this.sectionId]" v-if="typeof this.projects !== 'undefined' && this.projects.length > 0">
            <caption>{{ this.title }} &mdash; {{ (this.projects.length / this.totalCount * 100).toFixed(0) }}% of all projects in the list</caption>
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Release Level</td>
                    <td>Latest Release</td>
                </tr>
            </thead>
            <tbody>
                <tr v-for="project in this.projects">
                    <td>{{ project.title }} (<em>{{ project.name}}</em>)</td>
                    <td>{{ project.release_level }}</td>
                    <td>{{ project.release.length > 0 ? project.release[0].version.full : '' }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<style>
    .projects-section {
        width: 100%;
    }

    .projects-section caption {
        font-weight: bold;
        font-size: 1.2em;
    }

    .projects-section thead {
        font-weight: bold;
        font-size: 1.1em;
    }
</style>

<script>
    export default{
        props: ['sectionId', 'title', 'totalCount', 'projects']
    }
</script>
