"use strict";var _typeof="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e};"undefined"===_typeof(Craft.Freeform)&&(Craft.Freeform={}),Craft.Freeform.SubmissionsIndex=Craft.BaseElementIndex.extend({getViewClass:function(e){switch(e){case"table":return Craft.Freeform.SubmissionsTableView;default:return this.base(e)}},getDefaultSort:function(){return["dateCreated","desc"]}}),Craft.registerElementIndexClass("Solspace\\Freeform\\Elements\\Submission",Craft.Freeform.SubmissionsIndex);