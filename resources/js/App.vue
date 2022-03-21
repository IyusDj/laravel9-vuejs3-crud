<template>
    <Nav/>
    <Sidebar/>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper -my-5">
        <!-- Main content -->
        <!-- <div class="content"> -->
            <router-view/>
        <!-- </div> -->
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <Footer/>
</template>

<script>
import Nav from './components/Navbar.vue'
import Sidebar from './components/Sidebar.vue'
import Footer from './components/Footer.vue'

export default {
  name: 'App',
  components: {
    Nav,
    Sidebar,
    Footer,
  }
}
</script>