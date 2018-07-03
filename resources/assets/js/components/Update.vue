<template>
    <div class="modal" :class="openmodal">
        <div class="modal-background"></div>
        <div class="modal-card" v-shortkey="['esc']" @shortkey="close">

            <header class="modal-card-head">
                <p class="modal-card-title">Update Details for {{ list.name }}</p>
                <button class="delete" aria-label="close" @click="close"></button>
            </header>

            <section class="modal-card-body">

                <!-- Name -->
                <div class="field">
                    <label class="label">Name</label>

                    <div class="control">
                        <!-- "Bind Bulma class 'is-danger' to '<input>' if (exists) errors.name" -->
                        <input class="input" :class="{'is-danger':errors.name}" type="text" placeholder="First Last" v-model="list.name">
                    </div>
                    <!-- 
                    'errors' corresponds to the 'errors' data from the '<script>' return value.
                    "If there's an error, return the first item from the errors.name array".
                    -->                    
                    <small v-if="errors.name" class="has-text-danger">{{ errors.name[0] }}</small>
                    <small v-else>&nbsp;</small>

                </div>

                <!-- Phone -->
                <div class="field">
                    <label class="label">Phone</label>
                    <div class="control">
                        <!-- "Bind Bulma class 'is-danger' to '<input>' if (exists) errors.phone" -->
                        <input class="input" :class="{'is-danger':errors.phone}" type="number" placeholder="555-555-5555" v-model="list.phone">
                    </div>
                    <!-- 
                    'errors' corresponds to the 'errors' data from the '<script>' return value.
                    "If there's an error, return the first item from the errors.phone array".
                    -->                    
                    <small v-if="errors.phone" class="has-text-danger">{{ errors.phone[0] }}</small>
                    <small v-else>&nbsp;</small>

                </div>

                <!-- Email -->
                <div class="field">
                    <label class="label">Email</label>
                    <div class="control">
                        <!-- "Bind Bulma class 'is-danger' to '<input>' if (exists) errors.phone" -->
                        <input class="input" :class="{'is-danger':errors.email}" type="email" placeholder="user@example.com" v-model="list.email">
                    </div>
                    <!-- 
                    'errors' corresponds to the 'errors' data from the '<script>' return value.
                    "If there's an error, return the first item from the errors.email array".
                    -->                    
                    <small v-if="errors.email" class="has-text-danger">{{ errors.email[0] }}</small>
                    <small v-else>&nbsp;</small>
                </div>

            </section>

            <footer class="modal-card-foot">
                <button class="button is-success" @click="update">Update</button>
                <button class="button" @click="close">Cancel</button>
            </footer>

        </div>
    </div>
</template>

<script>

    export default {
        name: 'Update',
        props: ['openmodal'], // This is bound to an element with v-model
        data() {
            return {
                list: {},
                errors: {}
            }
        },
        methods: {
            close() {
                this.$emit('closeRequest')
            },
            update() {
                axios.patch(`/phonebook/${this.list.id}`, this.$data.list)
                    .then((response) => this.close())
                    .catch((error) => this.errors = error.response.data.errors)
            }
        }
    }

</script>
