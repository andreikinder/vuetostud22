<script>
    import { h } from 'vue';
    export default {
        name: "ExampleComponent",
        data(){
            return {
                name : "John Doe"
            }
        },
        render() {
            return h('div', {"id": "foo"}, [
                 h('h1', this.name)
            ])
        }
    }
</script>

