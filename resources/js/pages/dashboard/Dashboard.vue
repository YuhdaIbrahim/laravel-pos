<template>
    <section class="dashboard">
        <sidebar></sidebar>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Home</h2>
                        <div class="line"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 mb-4">
                        <div class="card-content">
                            <div class="header">
                                <h3>Overview</h3>
                            </div>
                            <div class="body">
                                <div class="filter">
                                    Last 7 Days

                                    <a href="#">Last 14 Days</a>
                                    <a href="#">Last 30 Days</a>
                                    <a href="#">Last 90 Days</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import sidebar from "../../components/dashboard/sidebar";
    export default {
        name: "Dashboard",
        components: { sidebar }
    }
</script>

<style scoped>

</style>
