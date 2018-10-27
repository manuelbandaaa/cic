<style type="text/css">
	.logo{
	  height: auto; 
	  width: auto; 
	  max-width: 40px; 
	  max-height: 40px;
	}

	/*scroll effect*/
	.navbar-trans {
	  background-color: #2F4F4F;
	  border: none;
	  transition: top 1s ease;
	  opacity: 0.8;
	}
	 
	/*double row*/
	.navbar-doublerow > .navbar{
	    display: block; 
	    padding: 0px auto;
	    margin: 0px auto;
	    min-height: 25px;
	}
	.navbar-doublerow .nav{
	    padding: 0px auto;
	}
	.navbar-doublerow .dividline{
	  padding-top: 1px;
	  background-color: inherit;
	}
	/*top nav*/
	.navbar-doublerow .navbar-top ul>li>a {
	    padding: 10px auto;
	    font-size: 12px;
	} 
	/*down nav*/
	.navbar-doublerow .navbar-down .navbar-brand {
	    color: #fff;
	    font-size: 20px;
	}
	.navbar-doublerow .navbar-down ul>li>a{
	    font-size: 16px;
	    color: white;
	    transition: border-bottom .2s ease-in , transform .2s ease-in-out;
	}
	.navbar-doublerow .navbar-down ul>li>a:hover{
	    border-bottom: 1px solid #fff;
	    color: #fff;
	}
	.navbar-doublerow .navbar-down .dropdown{
	    padding: 5px;
	    color: #000;
	}
	.navbar-doublerow .navbar-down .dropdown ul>li>a,
	.navbar-doublerow .navbar-down .dropdown ul>li>a:hover{
	  color: #000;
	  border-bottom: none;
	}
	.navbar-doublerow.navbar-trans.afterscroll {
	}   
	.navbar-doublerow.navbar-trans.afterscroll {
	  background-color: #2F4F4F;
	  top:-50px;
	-webkit-box-shadow: 0 8px 6px -6px #999;
	-moz-box-shadow: 0 8px 6px -6px #999;
	box-shadow: 0 8px 6px -6px #999;
	opacity: 1;
  	  filter: alpha(opacity=100);
	}   

	.flex-container {
	    display: flex;
	    justify-content: space-between;
	}
	.flex-item {
	}
	/*text*/
	.text-white,.text-white-hover:hover{color:#fff!important}
	/*fontcolor*/
	.light-grey {color:#000!important;background-color:#E6E9ED!important}
</style>