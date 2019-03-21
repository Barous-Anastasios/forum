<template>
    <div >
        <div class="form-group" v-if="signedIn">
            <textarea name="body"
                      id="body"
                      placeholder="Have something to say?"
                      class="form-control"
                      rows="5"
                      v-model="body"
                      required></textarea>
            <br>
            <button type="submit" class="btn btn-primary" @click="addReply">POST</button>
        </div>

        <p class="text-center" v-else>
            Please
            <a href="/login">sign in</a>
            to participate in this discussion.
        </p>
    </div>
    <!--@if(auth()->check())-->
    <!--<form method="POST" action="{{$thread->path() . '/replies'}}">-->
        <!--{{csrf_field()}}-->

    <!--</form>-->
    <!--@else-->

    <!--@endif-->
</template>

<script>
    export default {

        data() {
            return {
                body: ""
            }
        },

        computed: {
            signedIn() {
                return window.App.signedIn;
            }
        },

        methods: {
            addReply(){
                axios.post(location.pathname + '/replies', {body: this.body})
                    .then(({data}) => {
                        this.body = "";
                        flash("Your reply has been posted");
                        this.$emit('created', data);
                    });
            }
        }
    }
</script>

<style scoped>

</style>
