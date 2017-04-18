<template>
    <div>
        <table id="datatable" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Exercise</th>
                <th>Result</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="result in results">
                <td>{{ result.id }}</td>
                <td>{{ result.date }}</td>
                <td>{{ result.exercise.name }}</td>
                <td>{{ result.result }} {{ resultType(result) }}</td>
                <td>
                    <div class="btn-group">
                        <a type="button" :href="'/result/' + result.id" class="btn btn-secondary waves-effect">
                            View
                        </a>
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary dropdown-toggle  waves-effect" data-toggle="dropdown" aria-expanded="false"> More Options <span class="caret"></span> </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" :href="'/exercise/' + result.exercise_id">View all for exercise</a>
                                <a class="dropdown-item" :href="'/result/' + result.id + '/edit'">Edit result</a>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                results: JSON.parse(results)
            }
        },
        methods: {
            resultType(result){
                if(result.exercise.type_id == 3){
                    return 'm';
                } else if(result.exercise.type_id == 2){
                    return 'sec';
                } else if(result.exercise.type_id == 1){
                    return 'kg';
                }
            }
        },
        computed: {

        }
    }
</script>
