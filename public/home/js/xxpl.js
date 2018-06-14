$(function(){
    $.ajax({
        type: "GET",
        data:{pageSize:100},
        url: "/finance/borrowList",
        success: function(Data){
            var zong = Data.data;
            var numar = 100 ;
            var sYranking = "";
            var sYrankings = "";
            var perpage = 10;
            if(perpage > numar){
                perpage = numar;
            };
            for(var i=0; i<10; i++){
            	var borrowerNickName = zong[i].borrowerNickName; //编号
            	var borrowerUserName = zong[i].borrowerUserName; //借款人姓名
            	var idCard = zong[i].idCard;                     // 身份证号
            	var borrowPurpose = zong[i].borrowPurpose;      //借款用途
            	var borrowTerm = zong[i].borrowTerm;            // 期限
            	var borrowAmount = zong[i].borrowAmount;     // 金额
            	var borrowerAddress = zong[i].borrowerAddress;   //所在地
            	var auctionFullDate = zong[i].auctionFullDate;   //借款时间
//            	console.log(auctionFullDate);
            	var borrowProgress = zong[i].borrowProgress;    // 融资进度
            	var repayment = zong[i].repayment;            // 还款方式
            	var quota = zong[i].quota;                   //限额管理
            	var borrowStatus = zong[i].borrowStatus;                   //状态
            	var overdueCount = zong[i].overdueCount;                   //平台逾期次数
            	var repaymentMeasures = zong[i].repaymentMeasures;      //还款保障措施
            	if (borrowerAddress == null || borrowerAddress == '') {
            		borrowerAddress = "保密";
            	};                  
                if (borrowerNickName == null || borrowerNickName == '') {
                    borrowerNickName = "--";
                };                  
                if (borrowerUserName == null || borrowerUserName == '') {
                    borrowerUserName = "--";
                };                  
            	if (auctionFullDate == null || auctionFullDate == '') {
            		auctionFullDate = "--";
            	};                  
            	if (borrowPurpose == null || borrowPurpose == '') {
            		borrowPurpose = "日常消费";
            	};                  
                if(i%2==0){
                    some='<ul class="ycenter clearfix">'
                }else{
                    some='<ul class="ycenter ycenters clearfix">'
                }
                sYranking +=some+
				                '<li class="yones">'+borrowerNickName+'</li>'+
				                '<li class="yones">'+borrowerUserName+'</li>'+
				                '<li class="ytwos">'+idCard+'</li>'+
				                '<li class="yones">'+borrowPurpose+'</li>'+
				                '<li class="yones">'+borrowTerm+'月</li>'+
				                '<li class="yones">'+borrowAmount+'元</li>'+
				                '<li class="yones yck" id="yck">查看</li>'+
				                '<div class="yTable" style="display:none;">'+
				                    '<table cellpadding="0" cellspacing="0" border="0">'+
				                        '<tr>'+
				                            '<td width="110" style="text-align:center; font-weight: bold;">借款人编号</td>'+
				                            '<td width="129" class="bjLeft">'+borrowerNickName+'</td>'+
				                            '<td width="110" style="text-align:center; font-weight: bold;">所在地</td>'+
				                            '<td width="129" class="bjLeft">'+borrowerAddress+'</td>'+
				                            '<td width="110" style="text-align:center; font-weight: bold;">借款时间</td>'+
				                            '<td width="308" class="bjLeft">'+auctionFullDate+'</td>'+
				                        '</tr>'+
				                        '<tr>'+
				                            '<td style="text-align:center; font-weight: bold;">融资进度</td>'+
				                            '<td class="bjLeft">'+borrowProgress+'%</td>'+
				                            '<td style="text-align:center; font-weight: bold;">还款方式</td>'+
				                            '<td class="bjLeft">'+repayment+'</td>'+
				                            '<td style="text-align:center; font-weight: bold;">限额管理</td>'+
				                            '<td class="bjLeft">'+quota+'</td>'+
				                        '</tr>'+
				                        '<tr>'+
				                            '<td style="text-align:center; font-weight: bold;">状态</td>'+
				                            '<td class="bjLeft">'+borrowStatus+'</td>'+
				                            '<td rowspan="2"style="text-align:center; font-weight: bold;" >还款保障措施</td>'+
				                            '<td colspan="3" rowspan="2"  class="bjLeft" style="width:510px;">'+repaymentMeasures+'</td>'+
				                        '</tr>'+
				                        '<tr>'+
				                            '<td style="text-align:center; font-weight: bold;">平台逾期次数</td>'+
				                            '<td class="bjLeft">'+overdueCount+'次</td>'+
				                        '</tr>'+
				                    '</table>'+
				                '</div>'+              
				            '</ul>'            
            }
            $(".rankings").html(sYranking);
            // var flag = 1;
            $(document).on('click',".yck",function(){
                if($(this).next('.yTable').css('display')=='none'){
                    $(this).next('.yTable').slideDown(300);
                    $(this).html('收起');
                    // flag *= -1;
                }else {
                    $(this).next('.yTable').slideUp(300);
                    $(this).html('查看');
                    // flag *= -1;
                }

            });            
            
            $('#pageToolbar').Paging({pageSize:perpage,count:numar,toolbar:true,callback:function(page,size,count){
            var sYranking = "";
            var pageAll = 0;
            if(page*size>numar){
                pageAll = numar;
            }else{
                pageAll = page*size;
            };            
             for(var j=(page-1)*size;j<pageAll;j++){
             	(function(j){
            	var borrowerNickName = zong[j].borrowerNickName; //编号
            	var borrowerUserName = zong[j].borrowerUserName; //借款人姓名
            	var idCard = zong[j].idCard;                     // 身份证号
            	var borrowPurpose = zong[j].borrowPurpose;      //借款用途
            	var borrowTerm = zong[j].borrowTerm;            // 期限
            	var borrowAmount = zong[j].borrowAmount;     // 金额
            	var borrowerAddress = zong[j].borrowerAddress;   //所在地
            	var auctionFullDate = zong[j].auctionFullDate;   //借款时间
//            	console.log(auctionFullDate);
            	var borrowProgress = zong[j].borrowProgress;    // 融资进度
            	var repayment = zong[j].repayment;            // 还款方式
            	var quota = zong[j].quota;                   //限额管理
            	var borrowStatus = zong[j].borrowStatus;                   //状态
            	var overdueCount = zong[j].overdueCount;                   //平台逾期次数
            	var repaymentMeasures = zong[j].repaymentMeasures;      //还款保障措施
            	if (borrowerAddress == null || borrowerAddress == '') {
            		borrowerAddress = "保密";
            	};                  
                if (borrowerUserName == null || borrowerUserName == '') {
                    borrowerUserName = "--";
                };                  
                if (borrowerNickName == null || borrowerNickName == '') {
                    borrowerNickName = "--";
                };                  
            	if (auctionFullDate == null || auctionFullDate == '') {
            		auctionFullDate = "--";
            	};                  
            	if (borrowPurpose == null || borrowPurpose == '') {
            		borrowPurpose = "日常消费";
            	};                  
                if(j%2==0){
                    some='<ul class="ycenter clearfix">'
                }else{
                    some='<ul class="ycenter ycenters clearfix">'
                }
                sYranking +=some+
				                '<li class="yones">'+borrowerNickName+'</li>'+
				                '<li class="yones">'+borrowerUserName+'</li>'+
				                '<li class="ytwos">'+idCard+'</li>'+
				                '<li class="yones">'+borrowPurpose+'</li>'+
				                '<li class="yones">'+borrowTerm+'月</li>'+
				                '<li class="yones">'+borrowAmount+'元</li>'+
				                '<li class="yones yck" id="yck">查看</li>'+
				                '<div class="yTable" style="display:none;">'+
				                    '<table cellpadding="0" cellspacing="0" border="0">'+
				                        '<tr>'+
				                            '<td width="110" style="text-align:center; font-weight: bold;">借款人编号</td>'+
				                            '<td width="129" class="bjLeft">'+borrowerNickName+'</td>'+
				                            '<td width="110" style="text-align:center; font-weight: bold;">所在地</td>'+
				                            '<td width="129" class="bjLeft">'+borrowerAddress+'</td>'+
				                            '<td width="110" style="text-align:center; font-weight: bold;">借款时间</td>'+
				                            '<td width="308" class="bjLeft">'+auctionFullDate+'</td>'+
				                        '</tr>'+
				                        '<tr>'+
				                            '<td style="text-align:center; font-weight: bold;">融资进度</td>'+
				                            '<td class="bjLeft">'+borrowProgress+'%</td>'+
				                            '<td style="text-align:center; font-weight: bold;">还款方式</td>'+
				                            '<td class="bjLeft">'+repayment+'</td>'+
				                            '<td style="text-align:center; font-weight: bold;">限额管理</td>'+
				                            '<td class="bjLeft">'+quota+'</td>'+
				                        '</tr>'+
				                        '<tr>'+
				                            '<td style="text-align:center; font-weight: bold;">状态</td>'+
				                            '<td class="bjLeft">'+borrowStatus+'</td>'+
				                            '<td rowspan="2"style="text-align:center; font-weight: bold;" >还款保障措施</td>'+
				                            '<td colspan="3" rowspan="2"  class="bjLeft" style="width:510px;">'+repaymentMeasures+'</td>'+
				                        '</tr>'+
				                        '<tr>'+
				                            '<td style="text-align:center; font-weight: bold;">平台逾期次数</td>'+
				                            '<td class="bjLeft">'+overdueCount+'次</td>'+
				                        '</tr>'+
				                    '</table>'+
				                '</div>'+              
				            '</ul>'
				})(j)
            }
            $(".rankings").html(sYranking);             

            }});

            for(var i=0; i<100; i++){
            	var arry = [];
            	var borrowerNickName = zong[i].borrowerNickName; //编号
            	var borrowerUserName = (zong[i].borrowerUserName); //借款人姓名
            		arry.push(zong[i].borrowerUserName);
            		arry = arry.join("").replace(/\*/gi,'');
            	var idCard = zong[i].idCard;                     // 身份证号
            	var borrowPurpose = zong[i].borrowPurpose;      //借款用途
            	var borrowTerm = zong[i].borrowTerm;            // 期限
            	var borrowAmount = zong[i].borrowAmount;     // 金额
            	var borrowerAddress = zong[i].borrowerAddress;   //所在地
            	var AuctionFullDate = zong[i].AuctionFullDate;   //借款时间
            	var borrowProgress = zong[i].borrowProgress;    // 融资进度
            	var repayment = zong[i].repayment;            // 还款方式
            	var quota = zong[i].quota;                   //限额管理
            	var borrowStatus = zong[i].borrowStatus;                   //状态
            	var overdueCount = zong[i].overdueCount;                   //平台逾期次数
                var repaymentMeasures = zong[i].repaymentMeasures;                   //还款保障措施
                var id = zong[i].id;               //序号
                    arry = arry + "**";
                if (borrowerAddress == null || borrowerAddress == '') {
                    borrowerAddress = "保密";
                };
                if (borrowerUserName == null || borrowerUserName == '') {
                    borrowerUserName = "--";
                };
                if (borrowerNickName == null || borrowerNickName == '') {
                    borrowerNickName = "--";
                };
                if (auctionFullDate == null || auctionFullDate == '') {
                    auctionFullDate = "--";
                };
                if (borrowPurpose == null || borrowPurpose == '') {
                    borrowPurpose = "日常消费";
                };
                if (id < 10) {
                    id = "00"+id;
                } else if(id < 100){
                    id = "0"+id;
                };
				sYrankings += '<li class="clearfix"><span style="display: block; float:left; margin-right:24px;">'+arry+'</span><span style="display: block; float:left; margin-right:24px;">身份证号：'+idCard+'</span><span style=" width:90px;  display: block; float:left; margin-right:20px;">用途：'+borrowPurpose+'</span><span style="display: block; float:left; margin-right:24px;">期限：'+borrowTerm+'月</span>借款金额：'+borrowAmount+'元</li>'  
			}

            $(".ranking").html(sYrankings);
        }
    });
});    


