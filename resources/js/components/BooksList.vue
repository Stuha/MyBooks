<template>
    <div class="container">
        <div class="row">
            <div class="col-10">
                <table class="table table-striped" style="width: 81rem">
                    <thead class="table-header">
                    <tr>
                        <th class="table-head ">#</th>
                        <th v-for="column in columns" :key="column"
                            class="text-center">
                            {{ column | columnHead }}
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-if="BooksList.length === 0">
                        <td class="text-center" :colspan="columns.length + 1">No data found.</td>
                    </tr>
                    <tr v-for="(book, key) in BooksList" :key="book.id" class="text-center" v-else>
                        <td>{{ serialNumber(key) }}</td>
                        <td v-for="(value, field) in book">{{ value }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            columns: { type: Array, required: true },
        },
        data: function () {
            return {
                BooksList: [],
                loading: true
            }
        },
        mounted() {
            this.loadBooks();
        },
        methods: {
            loadBooks: function () {
                axios.get('/api/books')
                    .then((response) => {
                        this.BooksList = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            serialNumber: function(key) {
                return key + 1;
            },
        },
        filters: {
            columnHead: function (value) {
                return value.split('_').join(' ').toUpperCase()
            }
        },
    }
</script>


