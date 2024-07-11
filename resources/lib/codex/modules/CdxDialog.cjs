"use strict";var B=(t,n,d)=>new Promise((f,s)=>{var i=l=>{try{r(d.next(l))}catch(u){s(u)}},c=l=>{try{r(d.throw(l))}catch(u){s(u)}},r=l=>l.done?f(l.value):Promise.resolve(l.value).then(i,c);r((d=d.apply(t,n)).next())});const e=require("vue"),_=require("./CdxButton.cjs"),A=require("./Icon.js"),O=require("./useGeneratedId.cjs"),P=require("./useI18n.cjs"),x=require("./useResizeObserver.cjs"),z=require("./_plugin-vue_export-helper.js"),j=e.defineComponent({name:"CdxDialog",components:{CdxButton:_,CdxIcon:A.CdxIcon},inheritAttrs:!1,props:{open:{type:Boolean,default:!1},title:{type:String,required:!0},subtitle:{type:String,required:!1,default:null},hideTitle:{type:Boolean,default:!1},useCloseButton:{type:Boolean,default:!1},closeButtonLabel:{type:String,default:""},primaryAction:{type:Object,default:null},defaultAction:{type:Object,default:null},stackedActions:{type:Boolean,default:!1},target:{type:String,default:null},renderInPlace:{type:Boolean,default:!1}},emits:["update:open","primary","default"],setup(t,{emit:n}){const d=O("dialog-label"),f=e.ref(),s=e.ref(),i=e.ref(),c=e.ref(),r=e.ref(),l=e.ref(),u=e.computed(()=>t.useCloseButton||t.closeButtonLabel.length>0),E=P("cdx-dialog-close-button-label",()=>t.closeButtonLabel||"Close"),$=e.computed(()=>!t.hideTitle||u.value),w=e.computed(()=>!!t.primaryAction||!!t.defaultAction),N=x(i),T=e.computed(()=>{var o;return(o=N.value.height)!=null?o:0}),y=e.ref(!1),V=e.computed(()=>({"cdx-dialog--vertical-actions":t.stackedActions,"cdx-dialog--horizontal-actions":!t.stackedActions,"cdx-dialog--dividers":y.value})),S=e.inject("CdxTeleportTarget",void 0),I=e.computed(()=>{var o,a;return(a=(o=t.target)!=null?o:S)!=null?a:"body"}),h=e.ref(0);function H(){n("update:open",!1)}function L(){m(s.value)}function q(){m(s.value,!0)}function m(o,a=!1){let g=Array.from(o.querySelectorAll('\n					input, select, textarea, button, object, a, area,\n					[contenteditable], [tabindex]:not([tabindex^="-"])\n				'));a&&(g=g.reverse());for(const C of g)if(C.focus(),document.activeElement===C)return!0;return!1}let p=[],b=[];function D(){let o=f.value;for(;o.parentElement&&o.nodeName!=="BODY";){for(const a of Array.from(o.parentElement.children))a===o||a.nodeName==="SCRIPT"||(a.hasAttribute("aria-hidden")||(a.setAttribute("aria-hidden","true"),p.push(a)),a.hasAttribute("inert")||(a.setAttribute("inert",""),b.push(a)));o=o.parentElement}}function F(){for(const o of p)o.removeAttribute("aria-hidden");for(const o of b)o.removeAttribute("inert");p=[],b=[]}function v(){return B(this,null,function*(){var o;yield e.nextTick(),h.value=window.innerWidth-document.documentElement.clientWidth,document.documentElement.style.setProperty("margin-right","".concat(h.value,"px")),document.body.classList.add("cdx-dialog-open"),D(),m(i.value)||(o=c.value)==null||o.focus()})}function k(){document.body.classList.remove("cdx-dialog-open"),document.documentElement.style.removeProperty("margin-right"),F()}return e.onMounted(()=>{t.open&&v()}),e.onUnmounted(()=>{t.open&&k()}),e.watch(e.toRef(t,"open"),o=>{o?v():k()}),e.watch(T,()=>{i.value&&(y.value=i.value.clientHeight<i.value.scrollHeight)}),{close:H,cdxIconClose:A.X3,labelId:d,rootClasses:V,backdrop:f,dialogElement:s,focusTrapStart:r,focusTrapEnd:l,focusFirst:L,focusLast:q,dialogBody:i,focusHolder:c,showHeader:$,showFooterActions:w,useCloseButtonOrLabel:u,translatedCloseButtonLabel:E,computedTarget:I}}}),R=["aria-label","aria-labelledby"],W={key:0,class:"cdx-dialog__header__title-group"},K=["id"],M={key:0,class:"cdx-dialog__header__subtitle"},G={ref:"focusHolder",class:"cdx-dialog-focus-trap",tabindex:"-1"},U={key:0,class:"cdx-dialog__footer__text"},X={key:1,class:"cdx-dialog__footer__actions"};function Y(t,n,d,f,s,i){const c=e.resolveComponent("cdx-icon"),r=e.resolveComponent("cdx-button");return e.openBlock(),e.createBlock(e.Teleport,{to:t.computedTarget,disabled:t.renderInPlace},[e.createVNode(e.Transition,{name:"cdx-dialog-fade",appear:""},{default:e.withCtx(()=>[t.open?(e.openBlock(),e.createElementBlock("div",{key:0,ref:"backdrop",class:"cdx-dialog-backdrop",onClick:n[5]||(n[5]=(...l)=>t.close&&t.close(...l)),onKeyup:n[6]||(n[6]=e.withKeys((...l)=>t.close&&t.close(...l),["escape"]))},[e.createElementVNode("div",{ref:"focusTrapStart",tabindex:"0",onFocus:n[0]||(n[0]=(...l)=>t.focusLast&&t.focusLast(...l))},null,544),e.createElementVNode("div",e.mergeProps({ref:"dialogElement",class:["cdx-dialog",t.rootClasses],role:"dialog"},t.$attrs,{"aria-label":t.$slots.header||t.hideTitle?t.title:void 0,"aria-labelledby":!t.$slots.header&&!t.hideTitle?t.labelId:void 0,"aria-modal":"true",onClick:n[3]||(n[3]=e.withModifiers(()=>{},["stop"]))}),[t.showHeader||t.$slots.header?(e.openBlock(),e.createElementBlock("header",{key:0,class:e.normalizeClass(["cdx-dialog__header",{"cdx-dialog__header--default":!t.$slots.header}])},[e.renderSlot(t.$slots,"header",{},()=>[t.hideTitle?e.createCommentVNode("v-if",!0):(e.openBlock(),e.createElementBlock("div",W,[e.createElementVNode("h2",{id:t.labelId,class:"cdx-dialog__header__title"},e.toDisplayString(t.title),9,K),t.subtitle?(e.openBlock(),e.createElementBlock("p",M,e.toDisplayString(t.subtitle),1)):e.createCommentVNode("v-if",!0)])),t.useCloseButtonOrLabel?(e.openBlock(),e.createBlock(r,{key:1,class:"cdx-dialog__header__close-button",weight:"quiet",type:"button","aria-label":t.translatedCloseButtonLabel,onClick:t.close},{default:e.withCtx(()=>[e.createVNode(c,{icon:t.cdxIconClose},null,8,["icon"])]),_:1},8,["aria-label","onClick"])):e.createCommentVNode("v-if",!0)])],2)):e.createCommentVNode("v-if",!0),e.createElementVNode("div",G,null,512),e.createElementVNode("div",{ref:"dialogBody",class:e.normalizeClass(["cdx-dialog__body",{"cdx-dialog__body--no-header":!(t.showHeader||t.$slots.header),"cdx-dialog__body--no-footer":!(t.showFooterActions||t.$slots.footer||t.$slots["footer-text"])}])},[e.renderSlot(t.$slots,"default")],2),t.showFooterActions||t.$slots.footer||t.$slots["footer-text"]?(e.openBlock(),e.createElementBlock("footer",{key:1,class:e.normalizeClass(["cdx-dialog__footer",{"cdx-dialog__footer--default":!t.$slots.footer}])},[e.renderSlot(t.$slots,"footer",{},()=>[t.$slots["footer-text"]?(e.openBlock(),e.createElementBlock("p",U,[e.renderSlot(t.$slots,"footer-text")])):e.createCommentVNode("v-if",!0),t.showFooterActions?(e.openBlock(),e.createElementBlock("div",X,[t.primaryAction?(e.openBlock(),e.createBlock(r,{key:0,class:"cdx-dialog__footer__primary-action",weight:"primary",action:t.primaryAction.actionType,disabled:t.primaryAction.disabled,onClick:n[1]||(n[1]=l=>t.$emit("primary"))},{default:e.withCtx(()=>[e.createTextVNode(e.toDisplayString(t.primaryAction.label),1)]),_:1},8,["action","disabled"])):e.createCommentVNode("v-if",!0),t.defaultAction?(e.openBlock(),e.createBlock(r,{key:1,class:"cdx-dialog__footer__default-action",disabled:t.defaultAction.disabled,onClick:n[2]||(n[2]=l=>t.$emit("default"))},{default:e.withCtx(()=>[e.createTextVNode(e.toDisplayString(t.defaultAction.label),1)]),_:1},8,["disabled"])):e.createCommentVNode("v-if",!0)])):e.createCommentVNode("v-if",!0)])],2)):e.createCommentVNode("v-if",!0)],16,R),e.createElementVNode("div",{ref:"focusTrapEnd",tabindex:"0",onFocus:n[4]||(n[4]=(...l)=>t.focusFirst&&t.focusFirst(...l))},null,544)],544)):e.createCommentVNode("v-if",!0)]),_:3})],8,["to","disabled"])}const J=z._export_sfc(j,[["render",Y]]);module.exports=J;
