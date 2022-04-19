<template>
    <div class="container">
        <div class="row g-0">
            <div class="col">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" value="title" name="title" id="title"
                           @click="radioSelect('title')">
                    <label class="form-check-label" for="title">Title</label>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" value="author_name" name="summary" id="author-name"
                           @click="radioSelect('author_name')">
                    <label class="form-check-label" for="author-name">Author name</label>
                </div>
            </div>
            <input type="text" v-model="searchQuery"  id="search-task" class="col search form-control" name="keyword"
                   placeholder="Enter keyword">
            <button type="submit" @click="search" class="col-sm-3 btn btn-sm btn-dark" id="search-button">Search</button>
        </div>
        <div class="row">
            <div class="col-10">
                <table class="table table-striped" style="width: 81rem">
                    <thead class="table-header">
                        <tr>
                            <th class="text-center">#</th>
                            <th v-for="column in columns" :key="column"
                                class="text-center">
                                {{ column | columnHead }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-if="booksList.length === 0">
                            <td class="text-center" :colspan="columns.length + 1">No data found.</td>
                        </tr>
                        <tr v-for="(book, key) in booksList" :key="book.id" class="text-center" v-else>
                            <td>{{ serialNumber(key) }}</td>
                            <td v-for="(value, field) in book">{{ value }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <nav v-if="pagination && booksList.length > 0">
                <ul class="pagination">
                    <li class="page-item" :class="{'disabled' : currentPage === 1}">
                        <a class="page-link" href="#" @click.prevent="changePage(currentPage - 1)">Previous</a>
                    </li>
                    <li v-for="page in pagesNumber" class="page-item"
                        :class="{'active': page === pagination.meta.current_page}">
                        <a href="javascript:void(0)" @click.prevent="changePage(page)" class="page-link">{{ page }}</a>
                    </li>
                    <li class="page-item" :class="{'disabled': currentPage === pagination.meta.last_page }">
                        <a class="page-link" href="#" @click.prevent="changePage(currentPage + 1)">Next</a>
                    </li>
                    <span style="margin-top: 8px;"> &nbsp; <i>Displaying {{ pagination.data.length }} of {{ pagination.meta.total }} entries.</i></span>
                </ul>
            </nav>
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
                booksList: [],
                pagination: {
                    meta: { to: 1, from: 1 }
                },
                offset: 4,
                currentPage: 1,
                perPage: 5,
                searchQuery: null,
                searchKey: null,
                loading: true
            }
        },
        mounted() {
            this.loadBooks();
        },
        computed: {
            /**
             * Get the pages number array for displaying in the pagination.
             * */
            pagesNumber() {
                if (!this.pagination.meta.to) {
                    return []
                }
                let from = this.pagination.meta.current_page - this.offset
                if (from < 1) {
                    from = 1
                }
                let to = from + (this.offset * 2)
                if (to >= this.pagination.meta.last_page) {
                    to = this.pagination.meta.last_page
                }
                let pagesArray = []
                for (let page = from; page <= to; page++) {
                    pagesArray.push(page)
                }
                return pagesArray
            },
            /**
             * Get the total data displayed in the current page.
             * */
            totalData() {
                return (this.pagination.meta.to - this.pagination.meta.from) + 1
            },
        },
        methods: {
            loadBooks: function () {
                let url = '/api/books';
                let dataUrl = `${url}?page=${this.currentPage}&column=${this.sortedColumn}&order=${this.order}&per_page=${this.perPage}`

                axios.get(dataUrl)
                    .then((response) => {
                        this.pagination = response.data;
                        this.booksList = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            search: function(){
                let searchParams = [];
                searchParams[0] = this.searchKey;
                searchParams[1] = this.searchQuery;

                axios.get('/search', {
                    params: {
                        searchParams: searchParams
                    }
                })
                    .then((response)=>{
                        this.pagination = null;
                        this.booksList = response.data.searchResult;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            radioSelect: function (searchKey) {
                this.searchKey = searchKey;
            },
            serialNumber: function(key) {
                return key + 1;
            },
            changePage(pageNumber) {
                this.currentPage = pageNumber
                this.loadBooks()
            }
        },
        filters: {
            columnHead: function (value) {
                return value.split('_').join(' ').toUpperCase()
            }
        },
    }
</script>


