<template>
    <div>
        <nav class="panel column is-offset-2 is-8">
            
            <p class="panel-heading">
                <!-- VueJS Phonebook -->
                <span class="lower pad-right">
                    {{ appName }}
                </span>
                <button class="button is-link is-outlined">
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
            
            <a class="panel-block">
                
                <span class="column is-9">
                    {{ fieldNames[0] }}
                </span>
                
                <span class="panel-icon column is-1">
                    <i class="has-text-danger fa fa-trash" aria-hidden="true"></i>
                </span>
            
                <span class="panel-icon column is-1">
                    <i class="has-text-info fa fa-edit" aria-hidden="true"></i>
                </span>

                <span class="panel-icon column is-1">
                    <i class="has-text-primary fa fa-eye" aria-hidden="true"></i>
                </span>
            </a>
            
        </nav>

        <Add></Add>

    </div>
</template>



<!-- This section was added by me manually for tinkering -->
<script>
    let Add = require('./Add.vue');

    module.exports = {
        components: { Add },
        data: function () {
            return {
                appName: 'VueJS Phonebook',
                buttonName: 'Add New',
                fieldNames: [
                    'marksheet'
                ]
            }
        }
    }
</script>



<!-- This section was added by me manually for tinkering -->
<style lang="css" scoped>

    /* Fixes icon-text alignment */
    .fa {
        position: relative;
        top: -0.4em;
    }

    /* Font-Awesome's 'Edit' Icon sits a bit too high */ 
    .fa-edit {
        top: -0.3em;
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

