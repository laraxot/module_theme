<script type="text/babel">
    var formSerialize = require('form-serialize');
    export default {
        name: "dynamic-form",
        props: ['url', 'dynamicFieldParent', 'dynamicFieldChild'],
        data() {
            return {
                title: '',
                content: '',
                components: null
            };
        },
        created() {
            this.load(this.url);
        },
        mounted() {
            if (this.dynamicFieldParent) {
                this.initializeDynamicFields();
            }
        },
        updated() {
            if (this.dynamicFieldParent) {
                this.initializeDynamicFields();
            }
        },
        methods: {
            load(url) {
                axios.get(url, {
                    headers: {'X-Requested-With': 'XMLHttpRequest'}
                }).then(response => {
                    this.title = response.data.title;
                    this.content = response.data.content;
                    this.components = response.data.components;
                });
            },

            handleClick(e) {
                if (e.target.tagName == 'BUTTON' && e.target.type == 'submit' && e.target.form.checkValidity()) {
                    this.submit(e);
                }
            },

            submit(e) {
                e.preventDefault();
                this.$root.$emit('form-sending');
                let data = formSerialize(e.target.form, {
                    hash: false, empty: true
                });
                data += '&' + e.target.name + '='
                        + encodeURIComponent(e.target.value);
                axios.post(this.url, data, {
                    headers: {'X-Requested-With': 'XMLHttpRequest'}
                }).then(response => {
                    this.title = response.data.title;
                    this.content = response.data.content;
                    this.components = response.data.components;
                    if (response.status == 201) {
                        this.$root.$emit('form-success');
                    }
                });
            },

            initializeDynamicFields() {
                var $parent = $('#' + this.dynamicFieldParent);
                var $child = $('#' + this.dynamicFieldChild);
                $parent.change(function() {
                    var $form = $parent.closest('form');
                    var formData = new FormData();
                    formData.set($parent.attr('name'), $parent.val());
                    axios.post($form.attr('action'), formData).then(response => {
                        $child.replaceWith(
                            response.data.content.find('#' + this.dynamicFieldChild)
                        );

                    });
                });
            }
        }
    }

/*
https://forum.vuejs.org/t/how-to-update-dom-after-pasting-html-trying-to-integrate-a-backend-generated-form/48692

*/
</script>
