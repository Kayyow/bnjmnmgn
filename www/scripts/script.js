var application = function() {
    var self = this;
    self.params = window.location.search.replace('?', '');
    self.params_ary = self.params.split('&');

    function highlight(parentSelector, param, value) {
        console.log(parentSelector, param, value);
        if (value !== '') value = '?'+ param +'=' + value;
        var dom_element = document.querySelector(parentSelector +' a[href="/'+ value +'"]');
        dom_element.className += 'active';
    }   

    var highlight_child_bar = function(parent) {
        switch(parent) {
            case '.nav_links':
                var param_url = 'page';
                var base_value = 'home';
                break;
            case '.sort_bar':
                var param_url = 'tri';
                var base_value = 'tout';
                break;
            default: break;
        }
        if (self.params.indexOf(param_url) === -1) {
            highlight(parent, param_url, '');
        } else {
            for (var i = 0; i < self.params_ary.length; i++) {
                var param = self.params_ary[i].split('=');
                var key = param[0];
                var value = param[1];
                if (key === param_url) {
                    if (value === base_value) {
                        highlight(parent, param_url, '');
                    } else {
                        highlight(parent, param_url, value);
                    }
                }
            }
        }
    }

    highlight_child_bar('.nav_links');
    if (self.params === '') {
        highlight_child_bar('.sort_bar');
    }
    for (var i = 0; i < self.params_ary.length; i++) {
        var key = self.params_ary[i].split('=')[0];
        if (key === 'tri') {
            highlight_child_bar('.sort_bar');
        }
    }
}
application();