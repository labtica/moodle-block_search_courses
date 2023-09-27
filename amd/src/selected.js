define([
    'core/config'
], function(mdlcfg) {
    'use strict';
    let clousure = function(){
        let container = document.querySelector('.block_search_courses');
        let selectSearchCourse = container.querySelector('#id_search_course');
        let btnSearchCourse = container.querySelector('.js-btn-link-course');

        function eventOnChangeSelect(){
            let inputSelectChanged = selectSearchCourse;
            let valueSelectChanged = inputSelectChanged.value;
            if(valueSelectChanged){
                let link = mdlcfg.wwwroot + '/course/view.php?id='+valueSelectChanged;
                btnSearchCourse.setAttribute('href',link);
                toggleBtn(true);
            } else {
                btnSearchCourse.removeAttribute('href');
                toggleBtn(false);
            }
        }

        function toggleBtn(show=true){
            if(show){
                btnSearchCourse.classList.remove('d-none');
            } else {
                btnSearchCourse.classList.add('d-none');
            }

        }

        return {
            eventOnChangeSelect
        };

    };

    return {
        init: clousure,
    };
});