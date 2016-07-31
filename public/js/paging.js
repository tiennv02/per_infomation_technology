/**
 * Created by forever-pc on 23/07/2016.
 */
function intPaging(pagingDiv, limitRows, count, currentPage, lastPage, showLinkTotal) {
    var html = "";
    if (limitRows < count) {
        html += '<div class="">';
        html += '<div id="news_paginate" class="">';
        html += '<ul class="pagination margin-none float-right">';
        if (lastPage > showLinkTotal) {
            html += '<li id="pageFirts" class="paginate_button page-item ' + ((currentPage == 1) ? ' disabled' : '' ) + '">';
            if (currentPage == 1) {
                html += '<div class="page-link">Firts</div>';
            } else {
                html += '<div class="page-link" onclick="selectPage(1)">Firts</div>';
            }
        }
        html += '<li id="news_previous" class="paginate_button page-item previous ' + ((currentPage == 1) ? ' disabled' : '') + '">';
        if (currentPage - 1 > 0) {
            html += '<div class="page-link" onclick="selectPage(' + (currentPage - 1) + ')">Previous</div>';
        } else {
            html += '<div class="page-link">Previous</div>';
        }
        html += '</li>';
        var half_total_links = Math.floor(showLinkTotal / 2);
        var from = currentPage - half_total_links;
        var to = currentPage + half_total_links;
        if (currentPage < half_total_links) {
            to += half_total_links - currentPage;
        }
        if (lastPage - currentPage < half_total_links) {
            from -= half_total_links - (lastPage - currentPage) - 1;
        }
        for (var i = 1; i <= lastPage; i++) {
            if (from < i && i < to) {
                html += '<li class="paginate_button page-item ' + ( (currentPage == i) ? ' active' : '' ) + '">';
                html += '<div class="page-link" onclick="selectPage(' + i + ')">' + i + '</div>';
                html += '</li>';
            }
        }
        html += '<li id="news_next" class="paginate_button page-item ' + ( (currentPage == lastPage) ? ' disabled' : '' ) + '">';
        if (currentPage == lastPage) {
            html += '<div class="page-link">Next</div>';
        } else {
            html += '<div class="page-link"  onclick="selectPage(' + (currentPage + 1) + ')">Next</div>';
        }
        html += '</li>';
        if (lastPage > showLinkTotal) {
            html += '<li id="pageLast" class="paginate_button page-item ' + ( (currentPage == lastPage) ? ' disabled' : '' ) + '">';
            if (currentPage == lastPage) {
                html += '<div class="page-link">Last</div>';
            } else {
                html += '<div class="page-link" onclick="selectPage(' + lastPage + ')">Last</div>';
            }
            html += ' </li>';
        }
        html += '</ul>';
        html += '</div>';
        html += '</div>';
    }
    pagingDiv.html(html);
}