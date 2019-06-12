(function ($, w, undefined) {
  if (w.footable == undefined || w.footable == null)
    throw new Error('Please check and make sure footable.js is included in the page and is loaded prior to this script.');

  var jQversion = w.footable.version.parse($.fn.jquery);
  if (jQversion.major == 1 && jQversion.minor < 8) { // For older versions of jQuery, anything below 1.8
    $.expr[':'].ftcontains = function(a, i, m) {
      return $(a).html().toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
    };
  } else { // For jQuery 1.8 and above
    $.expr[":"].ftcontains = $.expr.createPseudo(function(arg) {
      return function(elem) {
        return $(elem).html().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
      };
    });
  }

  var defaults = {
    filter: {
      enabled: true,
      input: '.footable-filter',
      timeout: 300,
      minimum: 2
    }
  };

  function Filter() {
    var p = this;
    p.name = 'Footable Filter';
    p.init = function(ft) {
    	
    	
    	
      if (ft.options.filter.enabled == true) {
        ft.timers.register('filter');
        $(ft.table).bind({
          'footable_initialized': function(e) {
            var $table = $(e.ft.table);
            var data = {
              'input': $table.data('filter') || e.ft.options.filter.input,
              'timeout': $table.data('filter-timeout') || e.ft.options.filter.timeout,
              'minimum': $table.data('filter-minimum') || e.ft.options.filter.minimum
            };
            $(data.input).keyup(function () {
              e.ft.timers.filter.stop();
              e.ft.timers.filter.start(function() {
                var val = $(data.input).val() || '';
               
                if (val.length < data.minimum) {
                	$("#mainCount").css("display", "block");
                	//$("#mainCountDup").css("display", "none");
                  $table.find("> tbody > tr:not(.footable-row-detail)").each(function() {
                	/*  var supportHidden = $("#supportHidden").val();
                    	var statusData = null;
                    	if(supportHidden == '1'){
                    		statusData =  $(this).find("td").eq(8).html();
                    	}else{
                    		statusData =  $(this).find("td").eq(7).html();
                    	}
                  	
                    	var lastFive = statusData.substr(statusData.length - 6);
                    	var trid = $(this).closest('tr').attr('id');
                	  
                     	if(trid != 'hide' && lastFive != 'Closed'){
                     	 p.showRow(this, e.ft);
                     	}*/
                	  p.showRow(this, e.ft);
                  });
                } else {
                  var filters = val.split(" ");
                  $table.find("> tbody > tr").hide();
                  var rows = $table.find("> tbody > tr:not(.footable-row-detail)");
                  
                /*  $.each(filters, function(i, f) {
                    if (f && f.length)
                      rows = rows.filter("*:ftcontains('" + f + "')");
                  });*/
                  $.each(filters, function(i, f) {
                      if (f && f.length){
                        rows = rows.filter("*:ftcontains('" + f + "')");
                       if(rows.length == 0){
                      	 $("#NoRowsAvailable").css("display", "block");
                      	 $("#mainCount").css("display", "none");
                      	 $("#mainCountDup").css("display", "block");
                      	 $("#countDup").html("0");
                      	 /*if($('#checkboxID').prop("checked") == true){
                      		 $('.RowToClick').show();
                        }else{
                        	 $('.RowToClick').hide();
                        }*/
                       }
                       else{
                    	  // console.log("rows.length : "+rows.length);
                    	   $("#mainCount").css("display", "none");  
                    	   $("#mainCountDup").css("display", "block");
                      	 $("#NoRowsAvailable").css("display", "none");
                      	 $("#countDup").html(rows.length);
                      	
                       }
                      }
                    });

                  rows.each(function() {
                	  /*var supportHidden = $("#supportHidden").val();
                  	var statusData = null;
                  	if(supportHidden == '1'){
                  		statusData =  $(this).find("td").eq(8).html();
                  	}else{
                  		statusData =  $(this).find("td").eq(7).html();
                  	}
                  	if(statusData == null){
                		 p.showRow(this, e.ft);
                	}else{
                	var lastFive = statusData.substr(statusData.length - 6);
                	if($("#checkboxID").is(":checked") && (supportHidden == undefined || supportHidden != '1')){
                		 p.showRow(this, e.ft);
                		// $("#mainCountcheck").html(document.getElementById("myTable").rows.length);
                	}else{
                		if(lastFive != 'Closed' && (supportHidden == undefined || supportHidden != '1')){
                       	 p.showRow(this, e.ft);
                       	// $("#mainCountcheck").html(parseInt(document.getElementById("myTable").rows.length)-parseInt($("#mainCountcheck2").html())-parseInt(1));
                       	}else{
                       	 var trid = $(this).closest('tr').attr('id');
                       	if(trid != 'hide' && lastFive != 'Closed'){
                       	 p.showRow(this, e.ft);
                       	}
                       		
                       	}
                	}
                	
                	}*/  
                	  
                	/*console.log("checked "+$("#checkboxID").is(":checked"));
                	if(lastFive != 'Closed'){
                	 p.showRow(this, e.ft);
                	}*/
					p.showRow(this, e.ft);
                  });
                }
              }, data.timeout);
            });
          }
        });
      }
    };
    
    p.showRow = function(row, ft) {
      var $row = $(row), $next = $row.next(), $table = $(ft.table);
    //  console.log($next);
      if ($row.is(':visible')) return; //already visible - do nothing
      if ($table.hasClass('breakpoint') && $row.hasClass('footable-detail-show') && $next.hasClass('footable-row-detail')) {
        $row.add($next).show();
        ft.createOrUpdateDetailRow(row);
      }
      else{
    		  $row.show();
    
      }
    };
  };
  
  w.footable.plugins.register(new Filter(), defaults);
  
})(jQuery, window);