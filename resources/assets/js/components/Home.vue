<template>
    <div>
        <nav class="panel column is-offset-2 is-8">
            
            <p class="panel-heading">
                <!-- VueJS Phonebook -->
                <span class="lower pad-right">
                    {{ appName }}
                </span>
                <button class="button is-primary is-outlined" @click="openAdd">
                    {{ buttonName }}
                </button>
            </p>
            
            <div class="panel-block">
                <p class="control has-icons-left">
                    <input class="input is-small" type="text" placeholder="search">
                    <span class="icon is-small is-left">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </span>
                </p>
            </div>
            
            <a class="panel-block" v-for="item, key in lists">
                
                <span class="column is-9">
                    {{ item.name }}
                </span>
                
                <span class="panel-icon column is-1">
                    <i class="has-text-grey fa fa-trash" aria-hidden="true"></i>
                </span>
            
                <span class="panel-icon column is-1">
                    <i class="has-text-grey fa fa-edit" aria-hidden="true" @click="openUpdate(key)"></i>
                </span>

                <span class="panel-icon column is-1">
                    <i class="has-text-grey fa fa-eye" aria-hidden="true" @click="openShow(key)"></i>
                </span>
            </a>
            
        </nav>

        <Add :openmodal="addActive" @closeRequest="closeAdd"></Add>
        <Show :openmodal="showActive" @closeRequest="closeShow"></Show>
        <Update :openmodal="updateActive" @closeRequest="closeUpdate"></Update>

    </div>
</template>



<!-- This section was added by me manually for tinkering -->
<script>
    // Import the Add component.
    let Add = require('./Add.vue');
    let Show = require('./Show.vue');
    let Update = require('./Update.vue');

    export default {
        components: { Add, Show, Update },
        methods: {
            // This method binds to the button element's @click event.
            openAdd() {
                this.addActive = 'is-active';
            },
            closeAdd() {
                this.addActive = '';
            },
            openShow(key) {
                // console.log(this.$children); // All components
                // console.log(this.$children[1]); // Component at index 1 (the 'Show' component)
                this.$children[1].list = this.lists[key];
                this.showActive = 'is-active';
            },
            closeShow() {
                this.showActive = '';
            },
            openUpdate(key) {
                this.$children[2].list = this.lists[key];
                this.updateActive = 'is-active';
            },
            closeUpdate() {
                this.updateActive = '';
            }
        },
        data: function () {
            return {
                appName: 'VueJS Phonebook',
                buttonName: 'Add New',
                fieldNames: ['marksheet'],
                addActive: '',
                showActive: '',
                updateActive: '',
                lists: {},
                errors: {}
            }
        },
        mounted: function () {
            // I added this function like this rather how the tut did it; See the docs for more info.
            this.$nextTick(function () {
                // Code that will run only after the entire view has been rendered
                console.log('This is a mounted lifecyle hook');
                // AJAX request.
                axios.post('/getData')
                    .then((response) => this.lists = response.data)
                    .catch((error) => this.errors = error.response.data.errors)
            })
        }
    }
</script>



<!-- This section was added by me manually for tinkering -->
<style lang="scss" scoped>

    /* Fixes icon-text alignment */
    .fa {
        position: relative;
        top: -0.4em;
    }

    /* Font-Awesome's 'Edit' Icon sits a bit too high */ 
    .fa-edit {
        top: -0.3em;
    }

    .fa-search {
        position: absolute;
        top: 0.6em;
    }

    .raise {
        position: relative;
        top: -0.25em;
    }

    .lower {
        position: relative;
        top: 0.25em;
    }

    .pad-right {
        padding-right: 0.5em;
    }
    .pad-left {
        padding-left: 0.5em;
    }

</style>

