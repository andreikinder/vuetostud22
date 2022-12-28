<template>
    <li>
        <a href="#" >support</a>
    </li>


        <vue-final-modal v-model="showModal" name="contact_support">
            <div class="modal-1" v-show="showModal">
                <form action=""
                      @keydown="submitted  = false"
                      @submit.prevent="conctactSupport">
                <div class="modal-background" @click="$vfm.hide('contact_support')"></div>
                <div class="modal-card">
                    <header class="modal-card-head">
                        <p class="modal-card-title">What kind of question do u have ?</p>
                        <button @click="$vfm.hide('contact_support')" class="delete" aria-label="close"></button>
                    </header>
                    <section class="modal-card-body">
                        <div class="field">
                            <label class="label">Name</label>
                            <div class="control">
                                <input class="input" type="text"
                                       @keydown="delete  errors.name"
                                       placeholder="Text input"
                                       v-model="message.name">
                            </div>
                            <p class="help is-danger"

                               v-text="errors.name[0]" v-if="errors.name"></p>

                        </div>

                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control has-icons-left has-icons-right">
                                <input class="input "
                                       @keydown="delete errors.email"
                                       type="email" placeholder="Email input" v-model="message.email">
                                <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
                                <span class="icon is-small is-right">
      <i class="fas fa-exclamation-triangle"></i>
    </span>
                            </div>

                            <p class="help is-danger"

                               v-text="errors.email[0]" v-if="errors.email"></p>
                        </div>


                        <div class="field">
                            <label class="label">Question</label>
                            <div class="control">
                                <textarea class="textarea"
                                          @keydown="delete errors.question"
                                          v-model="message.question" placeholder="Textarea"></textarea>
                                <p class="help is-danger"
                                   v-text="errors.question[0]" v-if="errors.question"></p>
                            </div>
                        </div>


                        <div class="field">
                            <label class="label">How much 5+1 ?</label>
                            <div class="control">
                                <input class="input"
                                       @keydown="delete errors.verification"
                                       type="text" placeholder="5+1 = ?" v-model="message.verification">
                                <p class="help is-danger"

                                   v-text="errors.verification[0]" v-if="errors.verification"></p>
                            </div>
                        </div>


                    </section>
                    <footer class="modal-card-foot">
                        <div class="field is-grouped">
                            <div class="control">
                                <button class="button is-link"
                                        :disabled="submitted"
                                        type="submit">Submit</button>
                            </div>
                            <div class="control">
                                <a  @click="$vfm.hide('contact_support')" class="button is-link is-light">Cancel</a>
                            </div>
                        </div>
                    </footer>
                </div>
                </form>
            </div>

        </vue-final-modal>
        <button @click="$vfm.show('contact_support')">Open Modal</button>

<!--    <li>-->
<!--        <a href="#" @click="this.$modal.show('contact_support_modal')">support</a>-->
<!--    </li>-->
<!--    <modal name="contact_support_modal">-->
<!--        <div> some contents</div>-->
<!--    </modal>-->
</template>

<script>
    export default {
        name: "SupportButton",
        data: () => ({
            showModal: false,
            submitted : false,
            errors : {},
            message: {}
        }),
        methods :{
            conctactSupport() {

                this.submitted = true
                console.log('hell')

                axios.post('/contactsupport', this.message).then(
                    response => {
                        this.$swal('Message was sent');
                        this.$vfm.hide('contact_support')
                        this.formReset()
                    }
                ).catch(  errors => {     this.errors = errors.response.data.errors} )
            },
            formReset(){
                this.message = {}
                this.submitted = false
            }
        }
    }
</script>

<style scoped>

</style>
