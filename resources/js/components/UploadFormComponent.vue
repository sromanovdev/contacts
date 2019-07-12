<template>
    <div>
        <h1>Upload Form Component</h1>

        <div class="alert alert-danger" role="alert" v-if="errors.length">
            <ul class="errors">
                <li v-for="error in errors">{{ error }}</li>
            </ul>
        </div>

        <div class="card-body" v-show="! fileUploaded">
            <p class="text-center text-info">{{ name }}</p>
            <div class="custom-file mb-3">
                <input type="file" class="custom-file-input" id="customFile" name="filename" v-on:change="onFileChange" >
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            <div class="m-t4">
                <button class="btn btn-primary" :disabled="! file" @click="formSubmit">Upload</button>
            </div>
        </div>

        <mapping-component
            v-if="fileUploaded && ! mappingChoosed"
            :fieldsFromFile="fieldsFromFile"
            :fieldsFromModel="fieldsFromModel"
            @save="saveSelectedMapping"
        />

        <alert-component
            v-if="mappingChoosed"
            :count="count"
        />

    </div>
</template>

<script>
    export default {
        name: "UploadFormComponent",

        data() {
            return {
                name: '',
                file: '',
                fileUploaded: false,
                mappingChoosed: false,

                mapping: false,
                count: 0,

                errors: [],
            };
        },

        computed: {
            fieldsFromFile() {
                return this.mapping ? this.mapping.fieldsFromFile : [];
            },
            fieldsFromModel() {
                return this.mapping ? this.mapping.fieldsFromModel : [];
            }
        },

        methods: {

            onFileChange(e) {
                this.file = e.target.files[0];
                this.name = e.target.files[0].name;
            },

            formSubmit(e) {
                e.preventDefault();

                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                };
                const formData = new FormData();
                formData.append('file', this.file, this.file.name);

                axios.post('/files', formData, config)
                    .then(({
                        data: {
                            data: {fields_from_file, fields_from_model}
                        }
                    }) => {

                        this.mapping = {
                            fieldsFromFile: fields_from_file,
                            fieldsFromModel: fields_from_model
                        };

                        this.fileUploaded = true;
                    })
                    .catch(({response: {
                        data: {
                            errors: {fields}
                        }
                    }}) => {
                        this.errors = fields;
                    });
            },

            saveSelectedMapping(data) {

                this.errors = [];

                axios.post('/contacts', {
                    fields: data.mapping
                })
                    .then(({
                        data : {
                            data: {count_rows}
                        }
                    }) => {

                        this.mappingChoosed = true;
                        this.count = count_rows;

                    })
                    .catch(({response: {
                        data: {
                            errors: {fields}
                        }
                    }}) => {
                        this.errors = fields;
                    });
            },
        }
    }
</script>

<style scoped>

</style>