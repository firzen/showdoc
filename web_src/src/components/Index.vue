<template>
  <div class="hello">

    <div class="block">
      <div class="row header  ">
        <div class="right pull-right">
          <ul class="inline pull-right">
          <li ><router-link :to="link">{{link_text}}</router-link></li>
                </ul>
          </div>  
        </div>

      <el-carousel :height="height" :autoplay="false" arrow="always">
        <el-carousel-item style="background-color: #1bbc9b;">

          <div class="slide">
              <img src="static/logo/b_64.png" alt="">
              <h2>文档中心</h2>
              <p><span v-html="$t('section_description1')"></span></p>
              
          </div>

        </el-carousel-item>

        <el-carousel-item style="background-color: #2C606A;">
          <div class="slide">
              <h2>{{$t("section_title2")}}</h2>
             
          </div>
        </el-carousel-item>

        <el-carousel-item style="background-color: #f90;">
          <div class="slide">
              <h2>{{$t("section_title3")}}</h2>
              
          </div>
        </el-carousel-item>

        <el-carousel-item style="background-color: #7CBD9D;">
          <div class="slide">
              <h2>{{$t("section_title4")}}</h2>
              
          </div>
        </el-carousel-item>

        <el-carousel-item style="background-color: #A77DC2;">
          <div class="slide">
              <h2>{{$t("section_title5")}}</h2>
              <p><span v-html="$t('section_description5')"></span></p>
          </div>
        </el-carousel-item>

     

        <el-carousel-item style="background-color: #4BBFC3;">
          <div class="slide">
              <h2>{{$t("section_title7")}}</h2>
            
          </div>
        </el-carousel-item>


      </el-carousel>
    </div>


  </div>
</template>

<script>
export default {
  name: 'Index',
  data () {
    return {
      height: '',
      link:'',
      link_text:''
    }
  },
  methods:{
    getHeight(){
       if (window.innerHeight){
          var winHeight = window.innerHeight;
       }   
       else if ((document.body) && (document.body.clientHeight)){
          var winHeight = document.body.clientHeight;
       }
        this.height = winHeight+'px' ;
      }
  },
  mounted () {
    var that = this ;
    this.getHeight();
    that.link = '/user/login';
    that.link_text = that.$t("index_login_or_register");
    this.get_user_info(function(response){
      if (response.data.error_code === 0 ) {
        that.link = '/item/index';
        that.link_text = that.$t("my_item");
      }
    });
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>


  .el-carousel__item { 
    text-align: center; 
    font: 25px "Microsoft Yahei"; 
    color: #fff;
  }

  .header{
   padding-right: 100px;
   padding-top: 30px;
   font-size: 18px; 
   position: fixed;
      right: 0;
      left: 0;
      z-index: 1030;
      margin-bottom: 0;
  }
  .header a {
      color: white;
      font-size: 12px;
      font-weight: bold;
  }
  .slide{
    width: 700px;
    position  : absolute;
    top       : 50%;
    left      : 50%;
    transform : translate(-50%,-50%);
    padding-top: 0px;
    padding-left: 15px;
    padding-right: 15px;
    padding-bottom: 0px;
    box-sizing: border-box;
  }

</style>
