<template>
    <ais-index
        :app-id="angoliaAppId"
        :api-key="angoliaAppKey"
        index-name="products"
    >


        <div class="row">

            <div class="col">

                <div class="jobs-end mt-5">
                    <div class="row">
                        <div class="col-md-6">
                            <ais-input class="search-keywords" placeholder="Search Keywords"></ais-input>
                            <ais-stats></ais-stats>
                        </div>

                    </div>
                </div>


<!--                <ais-refinement-list-->
<!--                    attribute-name="style"-->
<!--                    :classNames="{-->
<!--              'ais-refinement-list__item': 'checkbox'-->
<!--            }"-->
<!--                >-->
<!--                    <h3 slot="header">Product Style</h3>-->
<!--                </ais-refinement-list>-->


                <ais-price-range
                    attribute-name="price"
                    :classNames="{

            }"

                ></ais-price-range>
                <div class="latest-jobs">
<!--                    <template>-->
<!--                        <h2>Products</h2>-->
<!--                        <div class="row mt-5 jobs-list">-->
<!--                            <div class="col-md-2">-->
<!--                                <p>Product Price</p>-->
<!--                            </div>-->
<!--                            <div class="col-md-2">-->
<!--                                <p>Material</p>-->
<!--                            </div>-->
<!--                            <div class="col-md-2">-->
<!--                                <p>Style</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </template>-->


                    <ais-results>

                        <template slot-scope="{result}">


                            <div class="row jobs">
                                <div class="col-md-4">
<!--                                    <a :result="result" :href="('job/show/' + (result.id) )">-->

                                        <ais-highlight :result="result" attribute-name="result.images"></ais-highlight>

<!--                                    </a>-->


                                </div>

<!--                                <div class="col-md-2">-->
<!--                                    <p class="blue">-->
<!--                                        <ais-highlight :result="result" attribute-name="price"></ais-highlight>-->
<!--                                    </p>-->
<!--                                </div>-->
<!--                                <div class="col-md-2">-->
<!--                                    <p class="blue">-->
<!--                                        <ais-highlight :result="result" attribute-name="material"></ais-highlight>-->
<!--                                    </p>-->
<!--                                </div>-->
<!--                                <div class="col-md-2">-->
<!--                                    <p>-->
<!--                                        <ais-highlight :result="result" attribute-name="result.style"></ais-highlight>-->
<!--                                    </p>-->
<!--                                </div>-->
<!--                                <div class="col-md-2">-->
<!--                                    <p>-->
<!--                                        <ais-highlight :result="result" attribute-name=""></ais-highlight>-->
<!--                                    </p>-->
<!--                                </div>-->

                                </div>

                        </template>


                    </ais-results>
                    <ais-pagination :padding="2"></ais-pagination>
                </div>

            </div>
        </div>


    </ais-index>
</template>

<script>


    export default {



        mounted() {
            console.log('Component mounted.')
        },
        data() {

            return {

                angoliaAppId: process.env.MIX_ALGOLIA_APP_ID,
                angoliaAppKey: process.env.MIX_ALGOLIA_SECRET,
            }


        },

        methods: {

            // uploadCV: function () {
            //     alert('First Upload Your CV Please.');
            // },


            // apply() {
            //     this.errors = {};
            //     axios.post('apply', {id: this.id})
            //         .then(response => {
            //             alert('Message sent!');
            //         }).catch(error => {
            //         if (error.response.status === 422) {
            //             this.errors = error.response.data.errors || {};
            //         }
            //     })
            // },



            // apply(){
            //     axios.post('apply' + this.id);
            //
            // },
        }


    }
</script>
