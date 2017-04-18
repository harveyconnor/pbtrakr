<template>
    <div>
        <!--
        Display recent exercises here (Latest 5 submitted exercises and no duplicates).
        That way users can select an exercise they recently submitted a result for.

        Most Recent Exercises:
        * <Exercise Name>
        * <Exercise Name>
        * <Exercise Name>
        * <Exercise Name>
        * <Exercise Name>
        -->

        <form @keydown.enter.prevent="">
            <h1>1. Find My Exercise</h1>
            <!--[ START SEARCH ]-->
            <div :class="searchKey ? 'dropdown open' : 'dropdown'">
                <div class="form-group">
                    <label for="searchForm">Quick Search</label>
                    <span v-show="searchKey" class="text-xs-left text-muted"><a href="" @click.prevent="searchKey = ''">Click here to reset search</a></span>
                    <input id="searchForm" class="form-control form-control-lg" type="text" v-model="searchKey"
                           @keyup="search" placeholder="Already know the name of your exercise? Search here...">
                </div>
                <div class="dropdown-menu">
                    <a v-for="exercise in exercises" class="dropdown-item" href=""
                       @click.prevent="selectedExercise = exercise">{{ exercise.name }}</a>
                </div>
            </div>

            <!--[ END SEARCH ]-->

            <div class="form-group">
                <label>Discipline</label>
                <select class="form-control form-control-lg" v-model="selectedDiscipline">
                    <option selected disabled>Select a discipline</option>
                    <option v-for="discipline in disciplines" :value="discipline">{{ discipline.name }}</option>
                </select>
            </div>

            <div class="form-group">
                <label>Event</label>
                <select class="form-control form-control-lg" v-model="selectedEvent" @change="searchKey = ''; search();"
                        :disabled="!selectedDiscipline">
                    <option selected disabled>Select an event</option>
                    <option v-for="event in events" v-if="event.discipline_id == selectedDiscipline.id"
                            :value="event">
                        {{ event.name }}
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label>Exercise</label>
                <select class="form-control form-control-lg" v-model="selectedExercise" @change="stepCount = 1"
                        :disabled="!selectedEvent">
                    <option selected disabled>Select an exercise</option>
                    <option value="other">Other</option>
                    <option v-for="exercise in exercises" v-if="exercise.event_id == selectedEvent.id"
                            :value="exercise">{{ exercise.name }}
                    </option>
                </select>
            </div>
            <hr/>
            <div v-show="stepCount == 1 && selectedExercise != null ">
                <h1>2. Record my result</h1>
                <div class="form-group" v-show="exerciseType == 1">
                    <label>Enter the Weight</label>
                    <div class="input-group">
                        <input id="newResult" type="text" placeholder="" data-v-min="00.00" data-v-max="1000.00"
                               class="form-control autonumber">
                        <span class="input-group-addon">kg</span>
                    </div>
                    <span class="font-13 text-muted">Please enter the weight in kilograms.</span>
                </div>
                <div class="form-group" v-show="exerciseType == 2">
                    <label>Enter the Time</label>
                    <div class="input-group">
                        <input id="newResult2" type="text" placeholder="" data-v-min="00.00" data-v-max="1000.00"
                               class="form-control autonumber">
                        <span class="input-group-addon">seconds</span>
                    </div>
                    <span class="font-13 text-muted">Please enter the time in seconds.</span>
                </div>
                <div class="form-group" v-show="exerciseType == 3">
                    <label>Enter the Distance</label>
                    <div class="input-group">
                        <input id="newResult3" type="text" placeholder="" data-v-min="00.00" data-v-max="1000.00"
                               class="form-control autonumber">
                        <span class="input-group-addon">meters</span>
                    </div>
                    <span class="font-13 text-muted">Please enter the distance in meters.</span>
                </div>

                <div class="form-group">
                    <label>Additional Notes</label>
                    <textarea v-model="newNotes"
                              placeholder="Enter any important notes here (e.g. wind and weather conditions)."
                              class="form-control" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label>Date</label>
                    <div>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="dd/mm/yyyy" id="datepicker-autoclose"
                                   data-date-format="dd/mm/yyyy">
                            <span class="input-group-addon bg-custom b-0"><i class="icon-calender"></i></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button @click.prevent="submitForm" type="submit" class="btn btn-primary">Add New Result</button>
                </div>
            </div>
        </form>
        <!--<button @click="stepCount&#45;&#45;" v-if="stepCount > 0">Previous</button>-->
        <!--<button @click="stepCount++" v-if="stepCount < 1">Next</button>-->

        <!--[ Shows Form Builder for Creating a new Exercise ]-->


        <modal v-model="showModal" effect="fade" width="400">
            <div slot="modal-header" class="modal-header">
                <h4 class="modal-title">
                    Create New Exercise
                </h4>
            </div>
            <form>
                <div class="form-group">
                    <label>Discipline</label>
                    <select class="form-control form-control-lg" v-model="selectedDiscipline">
                        <option selected disabled>Select a discipline</option>
                        <option v-for="discipline in disciplines" :value="discipline">{{ discipline.name }}</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Event</label>
                    <select class="form-control form-control-lg" v-model="selectedEvent" @change="search"
                            :disabled="!selectedDiscipline">
                        <option selected disabled>Select an event</option>
                        <option v-for="event in events" v-if="event.discipline_id == selectedDiscipline.id"
                                :value="event">
                            {{ event.name }}
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Exercise Name</label>
                    <input v-model="newExName" class="form-control" type="text" id="exName"
                           placeholder="Enter a suitable name for your exercise">
                </div>
                <div class="form-group">
                    <label>Exercise Description</label>
                    <textarea v-model="newExDesc" placeholder="Enter the description for your exercise"
                              class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label>Exercise Type</label>
                    <select class="form-control form-control-lg" v-model="newExType">
                        <option selected disabled>Select a type</option>
                        <option value="1">Weight (kg)</option>
                        <option value="3">Time (seconds)</option>
                        <option value="3">Distance (meters)</option>
                    </select>
                </div>
            </form>
            <div slot="modal-footer" class="modal-footer">
                <button type="button" class="btn btn-danger" @click.prevent="selectedExercise = ''">Cancel</button>
                <button type="button" class="btn btn-primary" @click.prevent="submitFormNewExercise">Save Changes
                </button>
            </div>
        </modal>
    </div>
</template>

<script>
    import modal from 'vue-strap/src/Modal.vue'
    export default {
        components: {
            modal: modal,
        },
        data() {
            return {
                disciplines: JSON.parse(disciplines),
                events: JSON.parse(events),
                exercises: [],
                selectedDiscipline: '',
                selectedEvent: '',
                selectedExercise: '',
                newNotes: '',
                newExName: '',
                newExDesc: '',
                newExType: 1,
                errors: [],
                newExercise: '',
                stepCount: 0,
                searchKey: '',
            }
        },
        methods: {
            search(){

                if (this.searchKey) {
                    var eventQuery = 'q=' + this.searchKey;
                }
                else if (this.selectedEvent.id && !this.searchKey) {
                    var eventQuery = 'e=' + this.selectedEvent.id;
                }
                else {
                    var eventQuery = '';
                }
                if (eventQuery) {
                    setTimeout(function () {
                        axios.get('/api/exercise/search?' + eventQuery)
                            .then(response => {
                                var exercises = response.data;
                                this.exercises = exercises;
                            })
                            .catch(e => {
                                this.errors.push(e);
                                console.log(this.errors);
                                for (var i = 0; i < this.errors.length; i++) {
                                    console.log(this.errors[i].message + ' at: ' + new Date().getTime());
                                }
                            });
                    }.bind(this), 200);
                }
            },
            submitFormNewExercise(){

                var form = new FormData();
                form.append('name', this.newExName);
                form.append('description', this.newExDesc);
                form.append('type_id', this.newExType);
                form.append('event_id', this.selectedEvent.id);

                axios.post('/exercise/new', form)
                    .then(response => {
                        var newExercise = response.data;
                        this.selectedExercise = newExercise;
                        this.exercises = this.exercises.concat(newExercise);
                        swal({
                            title: "Success!",
                            text: "You have created a new exercise!",
                            type: "success",
                            showCancelButton: false,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "OK",
                            closeOnConfirm: false,
                            closeOnCancel: false
                        });
                    })
                    .catch(e => {
                        this.errors.push(e);
                        console.log(this.errors);
                        for (var i = 0; i < this.errors.length; i++) {
                            console.log(this.errors[i].message + ' at: ' + new Date().getTime());
                        }
                    });

            },
            submitForm(){

                var date = $("#datepicker-autoclose").val();
                if (this.exerciseType == 1) {
                    var res = $('#newResult').val();
                } else if (this.exerciseType == 2) {
                    var res = $('#newResult2').val();
                } else if (this.exerciseType == 3) {
                    var res = $('#newResult3').val();
                }


                var form = new FormData();
                form.append('date', date);
                form.append('result', res);
                form.append('exercise_id', this.selectedExercise.id);
                form.append('notes', this.newNotes);

                axios.post("/result/new", form).then(function (res) {

                    swal({
                            title: "Success!",
                            text: "You have added a new result!",
                            type: "success",
                            showCancelButton: false,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "OK",
                            closeOnConfirm: false,
                            closeOnCancel: false
                        },
                        function () {
                            window.location.href = '/results';
                        });

                });

            }
        },
        computed: {
            exerciseType(){
                if (this.selectedExercise) {
                    if (this.selectedExercise.type_id == 1) {
                        return 1;
                    } else if (this.selectedExercise.type_id == 2) {
                        return 2;
                    } else if (this.selectedExercise.type_id == 3) {
                        return 3;
                    }
                }
            },
            showModal(){
                if (this.selectedExercise == 'other') {
                    return true;
                }
                return false;
            }
        }
    }
</script>
