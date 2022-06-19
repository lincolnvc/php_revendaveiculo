function Pager(tableName, itemsPerPage) {
    this.tableName = tableName;
    this.itemsPerPage = itemsPerPage;
    this.currentPage = 1;
    this.pages = 0;
    this.inited = false;

    this.showRecords = function (from, to) {
        var rows = document.getElementById(tableName).rows;
        // i starts from 1 to skip table header row
        for (var i = 1; i < rows.length; i++) {
            if (i < from || i > to)
                rows[i].style.display = 'none';
            else
                rows[i].style.display = '';
        }
    }

    this.showPage = function (pageNumber) {
        if (!this.inited) {
            alert("not inited");
            return;
        }

        var oldPageAnchor = document.getElementById('pg' + this.currentPage);
        oldPageAnchor.className = 'pg-normal btn btn-primary';

        this.currentPage = pageNumber;
        var newPageAnchor = document.getElementById('pg' + this.currentPage);
        newPageAnchor.className = 'pg-selected btn btn-primary';

        var from = (pageNumber - 1) * itemsPerPage + 1;
        var to = from + itemsPerPage - 1;
        this.showRecords(from, to);
       $('html, body').animate({
            scrollTop: $("#tb1").offset().top
        }, 1000);
    }

    this.prev = function () {
        if (this.currentPage > 1){
            this.showPage(this.currentPage - 1);
        }
       $('html, body').animate({
            scrollTop: $("#tb1").offset().top
        }, 1000);        
    }

    this.next = function () {
        if (this.currentPage < this.pages) {
            this.showPage(this.currentPage + 1);
            //window.location.href = window.location
        }
       $('html, body').animate({
            scrollTop: $("#tb1").offset().top
        }, 1000);
    }

    this.init = function () {
        var rows = document.getElementById(tableName).rows;
        var records = (rows.length - 1);
        this.pages = Math.ceil(records / itemsPerPage);
        this.inited = true;
    }

    this.showPageNav = function (pagerName, positionId) {
        if (!this.inited) {
            alert("not inited");
            return;
        }
        var element = document.getElementById(positionId);

        var pagerHtml = '<button class="btn btn-primary" onclick="' + pagerName + '.prev();" class="pg-ctrl"> &#171 </button>';
        for (var page = 1; page <= this.pages; page++)
            pagerHtml += '<button class="btn btn-primary" id="pg' + page + '" class="pg-normal" onclick="' + pagerName + '.showPage(' + page + ');">' + page + '</button>';
        pagerHtml += '<button class="btn btn-primary" onclick="' + pagerName + '.next();" class="pg-ctrl"> &#187;</button>';

        element.innerHTML = pagerHtml;
    }
}

