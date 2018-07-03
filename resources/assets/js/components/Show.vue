<template>
    <div class="modal" :class="openmodal">
        <div class="modal-background"></div>
        <div class="modal-card" v-shortkey="['esc']" @shortkey="close">

            <header class="modal-card-head">
                <p class="modal-card-title">{{ list.name }}</p>
                <button class="delete" aria-label="close" @click="close" @keyup.esc="close"></button>
            </header>

            <section class="modal-card-body">
                <ul>
                    <!-- Name -->
                    <li class="panel-block">
                        <label class="column is-2 has-text-weight-bold">Name</label><span>{{ list.name }}</span>
                    </li>

                    <!-- Phone -->
                    <li class="panel-block">
                        <label class="column is-2 has-text-weight-bold">Phone</label><span>{{ list.phone }}</span>
                    </li>

                    <!-- Email -->
                    <li class="panel-block">
                        <label class="column is-2 has-text-weight-bold">Email</label><span>{{ list.email }}</span>
                    </li>
                </ul>
            </section>

            <footer class="modal-card-foot">
                <!-- <button class="button is-success" @click="close">OK</button> -->
                <!-- <button class="button" @click="close">Cancel</button> -->
                <button class="button is-primary" @click="close">Close</button>
            </footer>

        </div>
    </div>

</template>

<script>
    export default {
        name: 'Show',
        props: ['openmodal'],
        methods: {
            close() {
                this.$emit('closeRequest')
            }
        },
        data: function ( ) {
            return {
                list: ''
            }
        }
    }
</script>
