<!--
  jQuery JSON - WhatsApp InstaOrder
  Created by livelyworks - http://livelyworks.net
  Ver. 2.0.0
  Based on Bootstrap 5
 -->
 <!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8" />
    <title><?=$titulo ?></title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no, minimum-scale=1.0, maximum-scale=5.0" />
    <link rel="stylesheet" href="static-assets/packages/bootstrap-5/css/bootstrap.min.css" />
    <link href="static-assets/lw-jquery-whatsapp-insta-order/css/lw-jquery-whatsapp-insta-order.css" rel="stylesheet" />
    <link href="static-assets/packages/fontawesome-free-5.11.2-web/css/all.min.css" rel="stylesheet" />
    <!-- <link rel="apple-touch-icon" sizes="180x180" href="static-assets/ico/apple-touch-icon.png"> -->
    <!-- <link rel="icon" type="image/png" sizes="32x32" href="static-assets/ico/favicon-32x32.png"> -->
    <!-- <link rel="icon" type="image/png" sizes="16x16" href="static-assets/ico/favicon-16x16.png"> -->
    <link rel="icon" href="https://menusypedidos.net/wp-content/uploads/2024/08/cropped-Logo.png">
    <!-- <link rel="manifest" href="static-assets/ico/site.webmanifest"> -->
</head>
<!-- do not remove bs-4, used for theme recognition -->

<body class="d-flex flex-column h-100">
    <!-- Begin page content -->
    <div id="loaderContainer">
        <div class="preloader">Cargando ...</div>
        <span class="lw-waiting-text">Espere por favor</span>
        <div class="lw-loading-status">Inicializando...</div>
    </div>
    <div id="mainContainer" style="display: none">
        <!-- Main Container -->
        <div class="container lw-content-container mb-5">
            <header class="lw-page-header mb-3 d-none d-md-flex">
                <div class="row w-100 my-auto lw-page-header-content">
            <div class="col-9">
                    <!--  logo -->
                    <a class="navbar-brand text-center " href="index.html"><img id="storeLogo" src="<?=$logo ?>"
                        alt="Logo" /></a>
            </div>
                      <div class="col-3">
                          <!-- Show Cart Button -->
                          <span class="shopping-cart-btn-container "></span>
                          <!-- /Show Cart Button -->
                      </div>
                    </div>
            </header>
            <span class="shopping-cart-btn-container d-block d-md-none"></span>
            <!-- Content Holder -->
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12 mb-5 lw-sidebar-container pb-5">
                    <button class="btn btn-success btn-lg border lw-sidebar-toggle-btn">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </button>
                    <!-- Sidebar Holder -->
                    <!-- Categories Holder -->
                    <div class="card shadow-sm border-0 pl-3">
                        <div class="card-header">Categorías</div>
                        <div class="list-group list-group-flush" id="categoriesList">
                           <div class="mb-1">
                            <a data-categoryindex="all" href="#/category/uid-all"
                            class="category-link-all category-link list-group-item list-group-item-action active-category category-list-item-all mb-2">Todas</a>
                           </div>
                        </div>
                    </div>
                    <!-- /Categories Holder -->
                    <!-- /Sidebar Holder -->
                </div>
                <div class="lw-sidebar-overlay" style="display: none"></div>
                <div class="col-lg-9 col-md-8 col-sm-12 lw-main-area">
                    <div class="mb-5 lw-search-container text-center">
                        <a class="navbar-brand d-md-none d-sm-block" href="index.html"><img id="storeLogo"
                                src="<?=$logo ?>" alt="Logo" /></a>
                        <div class="input-group mt-md-5">
                            <span class="input-group-text lw-spotlight-search-text">Buscar</span>
                            <input type="search" class="search-product form-control form-control-lg"
                                placeholder="Descripción..." />
                            <button disabled class="btn btn-outline-secondary btn-lg clear-search-result-btn" type="button">&times;</button>
                        </div>
                        <!-- /input-group -->
                        <h5 class="text-center mt-2 text-info" id="searchedProductCounts"></h5>
                    </div>
                    <!-- Breadcrumb -->
                    <nav class="lw-breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb" id="productsBreadcrumb">
                            <li class="breadcrumb-item">Todos</li>
                        </ol>
                    </nav>
                    <!-- /Breadcrumb -->
                    <!-- Products Holder -->
                    <div id="productsContainer"></div>
                    <!-- /Products Holder -->
                    <hr>
                    <div class="clearfix mt-4 lw-result-loaded-text text-center"></div>
                    <div class="clearfix mt-4 d-grid">
                        <button class="btn btn-secondary lw-load-more-content btn-block w-50 m-auto">
                            Ver más
                        </button>
                    </div>
                </div>
            </div>
            <!-- /Content Holder -->
        </div>
        <!-- /Main Container -->
    </div>
    <footer class="footer mt-auto py-3 bg-dark">
        <div class="footer-text container text-center ">
            &copy; <span class="footer-store-name">Menus & Pedidos</span> 2024<a href="#" id="lwGotoTop"
                class="go-to-top fr float-end btn btn-dark">
                <i class="fa fa-arrow-up"></i> Subir </a>
        </div>
    </footer>
    <!-- Modal Placeholder -->
    <div id="modalContainer">
        <div class="modal fade lw-modal" id="commonModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content common-modal-content"></div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>

    <!-- Modal Placeholder -->
    <!--  Templates -->
    <!-- Submit Order form -->
    <script type="text/template" class="submit-order-form-template">
         <div class="modal-header">
             <h3 class="order-page-header modal-title">Detalles del pedido</h3>
             <button type="button" class="btn" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
           </div>
           <div class="modal-body order-page-body">
             <!-- Submit Order Form -->
             <form class="form-horizontal bs-4-form" id="submitOrderForm">
             <div class="bs-callout bs-callout-danger">
           Los campos marcados con <strong class="color-red">*</strong> son requeridos.
         </div>

         <div class="alert alert-danger hidden lw-errors-container">
             <strong>Error!!</strong>
             <p class="lw-other-error-message hidden">
             </p>
             <p class="lw-error-email hidden">
                 Por favor ingrese un email valido.
             </p>
         </div>
       <div>
           <!--  Name -->
             <div class="mb-3 form-group row">
                 <label for="fname" class="col-sm-3 col-md-3 col-lg-3 control-label text-end" ><strong class="color-red">*</strong>Nombre: </label>
                 <div class="col-sm-6 col-md-6 col-lg-6">
                   <input type="text" name="fname" value="" id="fname" class="form-control required" required autofocus>
                 </div>
                         </div>
           <!--  /Name -->
           <!--  Email -->
           <!-- <div class="mb-3 form-group row">
                   <label for="email" class="col-sm-3 col-md-3 col-lg-3 control-label text-end"> Email: </label>
                   <div class="col-sm-6 col-md-6 col-lg-6">
                    <input type="email" name="email" value="" id="email" class="form-control">
            </div>
                 </div> -->
                 <!--  /Email -->
                 <!--  Mobile Number -->
           <div class="mb-3 form-group row">
             <label for="mobile_number" class="col-sm-3 col-md-3 col-lg-3 control-label text-end"><strong class="color-red">*</strong> Teléfono: </label>
             <div class="col-sm-6 col-md-6 col-lg-6">
              <input type="number" name="mobile_number" minlength="9" maxlength="15" value="" id="mobile_number" class="form-control required" required>
      </div>
           </div>
           <!--  /Mobile Number -->
                <div class="lw-delivery-fields lw-delivery-field-table" style="display:none">
                     <!--  Table -->
                     <div class="mb-3 form-group row">
                        <label for="" class="col-sm-3 col-md-3 col-lg-3 control-label text-end"></label>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                         <div class="input-group">
                            <span class="input-group-text"><strong class="color-red">*</strong> Número de mesa:</span>
                          <input type="text" name="table_number" value="" id="table_number" class="form-control required">
                        </div>
                        </div>
                      </div>
                      <!--  /Table -->
                </div>
                 <!--  Address -->
                 <div class="lw-delivery-fields lw-delivery-field-delivery" style="display:none">
                    <div class="mb-3 form-group row">
                        <label for="add" class="col-sm-3 col-md-3 col-lg-3 control-label text-end"><strong class="color-red">*</strong> Dirección: </label>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                     <div class="input-group">
                                        <span class="input-group-text">Calle y número</span>
                                      <input type="text" name="add" value="" id="add" class="form-control required" autocomplete="off">
                                    </div>
                                    </div>
                                  </div>
                                    <!--  /Street -->
                                    <!--  City -->
                              <div class="mb-3 form-group row">
                                      <label for="" class="col-sm-3 col-md-3 col-lg-3 control-label text-end"></label>
                                      <div class="col-sm-6 col-md-6 col-lg-6">
                                       <div class="input-group">
                                        <span class="input-group-text">Colonia</span>
                                        <input type="text" name="city" value="" id="city" class="form-control required">
                                      </div>
                                      </div>
                                    </div>
                                    <!--  /City -->
                                    <!--  Zip code -->
                                    <div class="mb-3 form-group row">
                        <label for="" class="col-sm-3 col-md-3 col-lg-3 control-label text-end"></label>
                                      <div class="col-sm-6 col-md-6 col-lg-6">
                                       <div class="input-group">
                                        <span class="input-group-text">Ciudad</span>
                                        <input type="text" name="zip" value="" id="zip" class="form-control required">
                                      </div>
                                      </div>
                                    </div>

                                    <!--  /Zip code -->
                                    <!--  Country -->
                                    <div class="mb-3 form-group row">
                        <label for="" class="col-sm-3 col-md-3 col-lg-3 control-label text-end"></label>
                                      <div class="col-sm-6 col-md-6 col-lg-6">
                                       <div class="input-group">
                                        <span class="input-group-text">Referencias</span>
                                        <input type="text" name="country" value="" id="country" class="form-control ">
                                      </div>
                                      </div>
                                    </div>
                                    <!--  /Country -->
                 </div>
                 <!--  /Address -->
                 <!--  Message -->
                 <div class="mb-3 form-group row">
                     <label for="message" class="col-12 control-label">Instrucciones o comentario de entrega: </label>
                     <div class="col-12">
                       <textarea name="message" cols="40" rows="10" id="message" class="form-control"></textarea>
                   </div>
                   </div>
                 <!--  /Message -->
             </form>
             <!-- /Submit Order Form -->
           </div>
           <div class="modal-footer">
             <!--  Action Buttons -->
             <div class="lw-btns w-100"><a id="backToCartBtn" href="#" class="btn btn-light mr-2"><i class="fa fa-arrow-left"></i> Atras</a> <a href="#" id="submitOrderBtn" class="btn btn-lg btn-success btn-md mr-2 disabled float-end"><i class="fab fa-whatsapp"></i> Enviar pedido</a> <button class="btn order-page-close-btn btn btn-light" data-bs-dismiss="modal" aria-hidden="true">Cancelar</button></div>
             <!--  /Action Buttons -->
           </div>
    </script>
    <!-- /Submit Order form -->
    <!-- Shopping Cart. -->
    <script type="text/template" class="shopping-cart-template">
        <div class="modal-header">
        <h3 class="modal-title">Preparando su pedido</h3>
        <button type="button" class="btn" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
      <div class="table-responsive lw-shopping-cart">
        <table class="table table-striped table-bordered">
          <thead class="shadow-sm">
            <tr>
              <th>Foto</th>
              <th class="align-middle">Descripción</th>
              <th class="right-align">Precio</th>
              <th class="text-center">Cantidad</th>
              <th class="right-align">Total</th>
              <th class="text-center">Borrar</th>
            </tr>
          </thead>
          <tbody id="shoppingCartData">
              <% if( _oData.cartProductsCollection.length > 0 ) {
              _.each( _oData.cartProductsCollection, function(listItem, nCartRowIndex ) {
                var listItemProduct = _oData.allProductsCollection[listItem.index];
                var totalAddonPrice = 0,
                    itemTotal = listItemProduct.price;
                %>
                <tr class="cart-row-<%- nCartRowIndex %> shadow-sm">
                  <td class="align-middle">
                  <div class="lw-cart-thumbnail">
                    <img src="<%- listItemProduct.thumbPath %>" alt="<%- listItemProduct.name %>">
                  </div>
                  </td>
                  <td class="align-middle">
                      <h5 class="text-success">
                      <%- listItemProduct.name %>
                  </h5>
                  <%
                  if( !_.isEmpty(listItem.options) ) {
                      _.each( listItem.options, function(listItemOption, listItemOptionKey) {

                      var listOptionValueDetails = _.findWhere(listItemProduct.productOptions[listItemOptionKey].optionValues,{value:listItemOption.value});
                  %>
                  <div>
                      <small><%- listItemOption.optionTitle %>: <%- listItemOption.name %>
                      <% if(listOptionValueDetails.addonPrice) {
                          totalAddonPrice = totalAddonPrice + listOptionValueDetails.addonPrice;
                          itemTotal += listOptionValueDetails.addonPrice;
                      %>
                      (+ <%- listOptionValueDetails.addonPriceFormatted %>)
                      <% } %>
                  </small>
                  </div>
                   <% }); }
                    %>
                  </td>
                  <td class="right-align align-middle"><div><%- _oData.fnMisc.formatAmount(listItemProduct.price + totalAddonPrice) %></div>
                      <% if(listItemProduct.additionalShippingCharge) {
                          var itemShippingCharges = listItemProduct.calculateShipping();
                              itemTotal += itemShippingCharges;
                              if(itemShippingCharges) {
                      %>
                          <div><small>+ Shipping <%- _oData.fnMisc.formatAmount(itemShippingCharges) %></small></div>
                       <% } } %>
                      <% if(listItemProduct.taxPercentage || _oData.configOptions.taxPercentage) {
                          var itemTax = listItemProduct.calculateTax(totalAddonPrice);
                              itemTotal += itemTax;
                      %>
                          <div><small>+ envío <%- _oData.fnMisc.formatAmount(itemTax) %></small></div>
                       <% } %>
                  </td>
                  <td class="text-center lw-cart-qty-input align-middle">
                      <input data-cartrowindex="<%- nCartRowIndex %>" type="number" step="1" min="1" value="<%- listItem.qty %>" class="cart-product-qty center-align form-control"/>
                      </td>
                  <td class="right-align align-middle"><%- _oData.fnMisc.formatAmount(itemTotal *  listItem.qty) %></td>
                  <td class="text-center align-middle"><button type="button" data-cartrowindex="<%- nCartRowIndex %>" href="#" class="btn btn-light btn-block btn delete-product-from-cart" title="Borrar"><i class="fa fa-trash"></i></button></td>
                </tr>
              <% }); } else { %>
                  <td colspan="6" class="align-middle"><div class="alert alert-info">Carrito vacío!!</div></td> 
              <% } %>
          </tbody>
        </table>
        </div>
        <div id="shopping_cart_total" class="alert tar text-end col-lg-12">
            <div class="float-md-end">
                <!-- Order Types -->
           <% if(!_.isUndefined(_oData.configOptions.checkoutMethods.orderByWhatsApp.orderTypes)) { %>
            <div class="mb-3 form-group row">
                <label class="col-sm-12 control-label text-left" for="orderTypeSelection"><strong class="color-red">*</strong> Seleccione el tipo de pedido</label>
                <div class="col-sm-12">
                <select class="form-select form-control form-control-lg" name="order_type" id="orderTypeSelection">
                    <option value="">Selecciona</option>
                    <% _.each( _oData.configOptions.checkoutMethods.orderByWhatsApp.orderTypes, function(itemValue, itemKey ) {
                        if(itemValue.enable == true) { %>
                            <option <%- (itemKey == _oData.generalVars.orderType) ? 'selected' : '' %> value="<%- itemKey %>"><%- itemValue.title %></option>
                            <%  }  %>
                    <%  }); %>
                </select>
            </div>
            </div>
            <% } %>
            </div>
            <div class="clear"></div>
      <div><strong><%- _oData.cartStats.totalItems %></strong> productos <%- _oData.fnMisc.formatAmount(_oData.cartStats.subTotal) %></div>
        <div>
            <%
          var fullTotal = _oData.cartStats.subTotal;
        if( fullTotal && _oData.cartStats.totalShippingCharges ) {
          fullTotal += _oData.cartStats.totalShippingCharges;
        %>
        + Total Shipping: <%- _oData.fnMisc.formatAmount( _oData.cartStats.totalShippingCharges ) %>
        <% } %>
        <% if( _oData.cartStats.totalTaxes ) {
          fullTotal += _oData.cartStats.totalTaxes;
        %>
        </div>
        <div>
          + Envío: <%- _oData.fnMisc.formatAmount( _oData.cartStats.totalTaxes ) %>
        </div>
        <% } %>
        <br>
        <h3 class="text-primary"> <small>Total del pedido </small> <%- _oData.fnMisc.fullFormatAmount(fullTotal) %> </h3>
        </div>
          </div>
        <div class="modal-footer">
        <div class="lw-btns w-100">
            <a href="#" class="btn btn-light" data-bs-dismiss="modal"><i class="fa fa-arrow-left"></i> Continuar ordenando</a>
            <% if(!_.isEmpty(_oData.configOptions.checkoutMethods)) { %>
            <% _.each(_oData.configOptions.checkoutMethods,function( checkoutMethod ) {
              if(checkoutMethod.enable === true) { %>
        <a href="#" id="<%- checkoutMethod.btnElement.id %>" data-method="<%- checkoutMethod.method %>" class="lw-checkout-button float-end btn btn-lg <%- checkoutMethod.btnElement.class %> <% if( ! _oData.generalVars.enableOrderBtn) { %> disabled <% } %>" title="<%- checkoutMethod.title ? checkoutMethod.title : '' %>" <% if( ! _oData.generalVars.enableOrderBtn) { %> disabled <% } %> >
        <% if(checkoutMethod.btnElement.imageUrl) { %>
        <img src="<%- checkoutMethod.btnElement.imageUrl %>" alt="<%- checkoutMethod.title ? checkoutMethod.title : '' %>" /> <%- checkoutMethod.title ? checkoutMethod.title : '' %>
         <% } else if(checkoutMethod.btnElement.title) { %>
          <%= checkoutMethod.btnElement.title %>
           <% } }  %>
          </a>
         <% }) } %>
        </div>
       </div>
    </script>
    <!-- /Shopping Cart. -->
    <!-- Shopping Cart button. -->
    <script type="text/template" class="shopping-cart-btn-template">
        <div class="d-grid">
      <a title="Items ready for Order" class="btn btn-danger show-shopping-cart-btn btn-block btn-lg" href="#/shopping-cart/uid-show">
        <i class="fab fa-whatsapp"></i> <strong><%- _oData.cartStats.totalItems %></strong> producto(s) de <%- _oData.cartStats.amountFormatted %></a></div>
    </script>
    <!-- /Shopping Cart button. -->
    <!-- Add for Order button. -->
    <script type="text/template" class="add-to-cart-btn-template">
        <% if( ! _oData.nProductInCart ) { %>
          <div class="d-grid">
            <a href="#" class="btn btn-success add-to-cart-btn btn-block"><span class="add-to-cart-btn-text">Agregar al carrito</span> <i class="fa fa-shopping-cart"></i></a>
          </div>
      <% } else { %>
          <div class="d-grid">
            <a href="#" class="btn btn-success add-to-cart-btn btn-block"><span class="add-to-cart-btn-text">Actualizar carrito</span> <i class="fa fa-shopping-cart"></i> </a>
          </div>
      <% }%>
    </script>
    <!-- Sidebar Categories.↳ &#8627;-->
    <script type="text/template" class="sidebar-categories-template">
        <% _.each(_oData.categoriesCollection,function( listItem ) { %>
            <div class="mb-1">
                <a style="padding-left: <%- listItem.parentLevel * 10 %>px;" data-categoryindex="<%- listItem.index %>" href="#/category/uid-<%- listItem.index %>/<%- listItem.slug %>" class="category-link-<%- listItem.index %> category-link list-group-item-action list-group-item category-list-item-<%- listItem.index %>"> <% if(listItem.parentLevel != 1) { %> &#8627; <% }%> <%- listItem.name %> </a>
            </div>
      <% }) %>
    </script>
    <!-- /Add for Order button. -->
    <!-- Products Grid -->
    <script type="text/template" class="products-grid-template">
        <% if( _oData.currentProductCollection.length < 1) { %>
      <div class="clearfix">
          <div class="alert alert-warning">
              Sin productos
            </div>
      </div>
            <% } else { %>
            <div class="lw-gutter-sizer"></div>
            <% _.each( _oData.currentProductCollection, function( listItem ){ %>
                <div data-productindex="<%- listItem.index %>" class="card product-item product-item-new border">
                <% if(listItem.details) { %>
                <a data-productindex="<%- listItem.index %>" href="#/product/uid-<%- listItem.index %>/<%- listItem.slug %>" class="product-id-<%- listItem.index %> product-link">
                   <span title="Click for details" class="lw-details-link-window-icon"> <i class="fa fa-info-circle" aria-hidden="true"></i></span>
                <div class="thumb-holder">
                  <img class="card-img-top product-item-thumb-image" data-src="<%- listItem.thumbPath %>" alt="<%- listItem.name %>"></div>
              </a>
              <% } else { %> 
                    <span class="product-id-<%- listItem.index %> product-link">
                        <div class="thumb-holder"><img class="card-img-top product-item-thumb-image" data-src="<%- listItem.thumbPath %>" alt="<%- listItem.name %>"></div>
                </span>
              <% } %> 
              <div class="card-body">
                <% if(listItem.details) { %>
                 <a data-productindex="<%- listItem.index %>" href="#/product/uid-<%- listItem.index %>/<%- listItem.slug %>" class="product-id-<%- listItem.index %> product-link card-title">
                  <h5 class="product-name"> <%- listItem.name %></h5>
              </a>
              <% } else { %> 
                <h5 class="product-name"> <%- listItem.name %></h5>
              <% } %>
                <div class="lw-btns">
                 <% if(listItem.price) { %>
                <h4 class="product-price"><%- listItem.formattedPrice %>
                    <% if(listItem.hasAddonPrice) { %>
                  <sup class="lw-has-addon-price" title="Product Options selection may affect a price">+</sup>
                  <% } %>
                  <% if(listItem.oldPrice && (listItem.oldPrice.price != listItem.price)){ %>
                  <small class="old-product-price"> <%- listItem.oldPrice.formatted %></small>
                  <% } %>
                </h4>
                 <% } %>
                  <% if(listItem.price && !listItem.outOfStock) { %>
               <div class="d-grid">
                  <a tabindex="0" data-placement="top" data-bs-trigger="click" data-bs-toggle="popover" title="Agregar al pedido - <%- listItem.name %>" data-productindex="<%- listItem.index %>" class="btn btn-success btn-block add-to-cart-btn-grid-item grid-product-id-<%- listItem.index %>"><i class="fa fa-shopping-cart"></i> <span class="add-to-cart-btn-text-grid-item">Agregar al carrito</span> </a>
               </div>
                <% } else if(listItem.outOfStock) { %>
                 <div class="d-grid">
                     <button class="btn btn btn-warning disabled btn-block" disabled aria-hidden="true">Agotado</button>
                 </div>
                  <% } else { %>
                 <div class="d-grid">
                     <a tabindex="0" disabled href="#" class="btn btn-success  btn-block disabled">Contactar para precio</a>
                 </div>
                  <% } %>
                 <% if(listItem.detailsLink && listItem.detailsLink.link_url) { %>
                    <a rel="noopener" href="<%- listItem.detailsLink.link_url %>" target="<%- listItem.detailsLink.target ? listItem.detailsLink.target : '_blank' %>" class="btn btn-sm <%- listItem.detailsLink.class %>"><%- listItem.detailsLink.title ? listItem.detailsLink.title  : 'Details' %></a>
                     <% } %>
                </div>
              </div>
            </div>
            <% }); }; %>
    </script>
    <!-- /Products Grid -->
    <!-- Popover details -->
    <script type="text/template" class="product-options-popover-template">
        <div class="lw-popover-content p-2">
          <% var productOptions = _oData.oCurrentProductData.productOptions;
              if(_oData.fnMisc.objectLength(productOptions) > 0) {
              for(var productOptionKey in productOptions) {
                  var productOption = productOptions[productOptionKey];
              %>
              <div class="input-group">
                <span class="input-group-text"><%- productOption.title %></span>
                 <select data-title="<%- productOption.title %>" data-id="<%- productOption._id %>" class="form-control form-select product-option-<%- productOption._id %> option-selector">
              <%
              if(productOption.optionValues.length > 0) {
              _.each(productOption.optionValues,function(optionValue){ %>
              <option data-belongs-to="<%- productOption._id %>" value="<%- optionValue.value %>">
                  <%- optionValue.name %>
                  <% if(optionValue.addonPrice) { %>
                  (+ <%- optionValue.addonPriceFormatted %>)
                  <% }%>
              </option>
              <% }) %>
              <% }%>
              </select>
              </div>
              <% } %>
              <% }%>
              <div class="input-group mb-3">
                <span class="input-group-text">Cantidad</span>
                <input type="number" step="1" min="1" value="1" class="item-product-qty center-align form-control"/>
              </div>
              <div class="btn-group w-100">
                <button data-productindex="<%- _oData.oCurrentProductData.index %>" type="button" class="btn btn-success add-to-cart-btn-grid-item-save"><i class="lw-spin-animation fa fa-refresh"></i></button>
                <a href="#/shopping-cart/uid-show" class="btn btn-outline-success"><i class="fa fa-shopping-cart" aria-hidden="true"></i> &gt; <i class="fab fa-whatsapp" aria-hidden="true"></i></a>
              </div>
      </div>
    </script>
    <!-- /Popover details -->
    <!-- Product Details Modal -->
    <script type="text/template" class="products-details-modal-template">
        <div class="modal-header">
          <h3 class="modal-title"><%- _oData.oCurrentProductData.name %></h3>
             <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">&times;</button>
        </div>

        <div class="modal-body lw-modal-body row">
            <div class="col-12 mb-4">
                <div class="lw-product-attributes">
                    <% var categoryItem = _oData.categoriesCollection[_oData.oCurrentProductData.categoryIndex]; %>
                    <span>Categoría: </span><a data-categoryindex="<%- categoryItem.index %>" href="#/category/uid-<%- categoryItem.index %>/<%- categoryItem.slug %>" class="category-link-<%- categoryItem.index %> category-link"><%- categoryItem.name %></a> |
                    <span>Clave producto: </span><%- _oData.oCurrentProductData.id %>
                    </div>
            </div>
          <div class="col-sm-12 col-md-8">
              <h5>Descripción</h5>
              <%= _oData.oCurrentProductData.details %>
          </div>
          <div class="col-sm-12 col-md-4">
              <% if(_oData.oCurrentProductData.price) { %>
          <h4>Precio </h4>
          <h3 class="product-price mb-3"><%- _oData.oCurrentProductData.formattedPrice %>
          <% if(_oData.oCurrentProductData.hasAddonPrice){ %>
            <sup class="lw-has-addon-price" title="Product Options selection may affect a price">+</sup>
            <% } %>
                <% if(_oData.oCurrentProductData.oldPrice && (_oData.oCurrentProductData.oldPrice.price != _oData.oCurrentProductData.price)){ %>
            <small class="old-product-price"> <%- _oData.oCurrentProductData.oldPrice.formatted %></small>
            <% } %>
             <% } %>
             </h3>
              <div class="form">
      <% var productOptions = _oData.oCurrentProductData.productOptions;
      if(_oData.fnMisc.objectLength(productOptions) > 0) {
      for(var productOptionKey in productOptions) {
          var productOption = productOptions[productOptionKey];
      %>
      <div class="form-group mb-2">
          <label for="option_<%- productOption._id %>"><%- productOption.title %></label>
          <select data-title="<%- productOption.title %>" id="option_<%- productOption._id %>" data-id="<%- productOption._id %>" class="form-control form-select product-option-<%- productOption._id %> option-selector">
          <%
          if(productOption.optionValues.length > 0) {
          _.each(productOption.optionValues,function(optionValue){ %>
          <option data-belongs-to="<%- productOption._id %>" value="<%- optionValue.value %>">
              <%- optionValue.name %>
              <% if(optionValue.addonPrice) { %>
              (+ <%- optionValue.addonPriceFormatted %>)
              <% }%>
          </option>
          <% }) %>
          <% }%>
          </select>
          </div>
          <% } %>
          <% }%>
          <div class="form-group mb-2 mt-2">
          <div class="mt-3">
              <% if(_oData.oCurrentProductData.price && !_oData.oCurrentProductData.outOfStock) { %>
              <div class="input-group lw-number-spinner">
                <span class="input-group-text">Cantidad</span>
                  <span class="input-group-btn">
                      <button class="btn btn-default" data-dir="dwn">-</button>
                  </span>
                  <input type="number" step="1" min="1" value="1" class="item-product-qty center-align form-control"/>
                  <span class="input-group-btn">
                      <button class="btn btn-default" data-dir="up">+</button>
                  </span>
              </div>
          </div>
          </div>
          <div class="form-group lw-btns">
              <div id="addToCartBtnContainer"></div>
              <% } else if(_oData.oCurrentProductData.outOfStock) { %>
              <button class="btn btn btn-warning disabled" disabled aria-hidden="true">Agotado</button>
              <% } else { %>
              <button class="btn btn btn-success disabled" disabled aria-hidden="true">Contactar para precio</button>
              <% }%>
          </div>
          <div>
              <% if(_oData.oCurrentProductData.detailsLink && _oData.oCurrentProductData.detailsLink.link_url) { %>
              <hr>
              <a href="<%- _oData.oCurrentProductData.detailsLink.link_url %>" target="<%- _oData.oCurrentProductData.detailsLink.target ? _oData.oCurrentProductData.detailsLink.target : '_blank' %>" class="btn btn-light <%- _oData.oCurrentProductData.detailsLink.class %>"><%- _oData.oCurrentProductData.detailsLink.title ? _oData.oCurrentProductData.detailsLink.title  : 'Details' %></a>
               <% } %>
          </div>
          </div>
          </div>
        </div>
          </div>
        <div class="modal-footer">
              <button class="btn btn btn-light" data-bs-dismiss="modal" aria-hidden="true">Cancelar</button>
        </div>
    </script>
    <!-- /Product Details Modal -->

    <!-- WhatsApp order template -->
    <script type="text/template" class="whatsapp-order-template">
```
Nuevo pedido @ <%- _oData.configOptions.storeName %>

**************************

Pedido#      : <%- _oData.orderId %>
Tipo  : <%- _oData.selectedOrderType %><%- _oData.formDetails.table_number ? ("\nMesa#       :" +_oData.formDetails.table_number) : null %>

--------------------------
Datos del cliente
--------------------------
<%- _oData.formDetails.fname ? ('Nombre            : ' + _oData.formDetails.fname) : null %>
<%- _oData.formDetails.email ? ("Email           : " + _oData.formDetails.email ): null %><%- _oData.formDetails.mobile_number ? ("\nTeléfono          : " +_oData.formDetails.mobile_number) : null %><%- _oData.formDetails.add ? ("\nCalle y número         : " +_oData.formDetails.add) : null %><%- _oData.formDetails.city ? ("\nColonia            : " +_oData.formDetails.city) : null %><%- _oData.formDetails.zip ? ("\nCiudad : " +_oData.formDetails.zip) : null %><%- _oData.formDetails.country ? ("\nReferencia         : " +_oData.formDetails.country) : null %><%- _oData.formDetails.message ? ("\n\n--------------------------\nMensaje/Instrucciones:\n" +_oData.formDetails.message) : null %>

--------------------------
Detalles del pedido
--------------------------
<% if( _oData.cartProductsCollection.length > 0 ) {
var countIndex = 0;
_.each( _oData.cartProductsCollection, function(listItem, nCartRowIndex ) {
var listItemProduct = _oData.allProductsCollection[listItem.index];
var totalAddonPrice = 0,
itemTotal = listItemProduct.price;
countIndex ++; %>
<%- countIndex %>) <%- listItemProduct.name %> <% if( !_.isEmpty(listItem.options) ) { %> <% _.each( listItem.options, function(listItemOption, listItemOptionKey) {
var listOptionValueDetails = _.findWhere(listItemProduct.productOptions[listItemOptionKey].optionValues,{value:listItemOption.value}); %> <% if(listOptionValueDetails.addonPrice) { totalAddonPrice = totalAddonPrice + listOptionValueDetails.addonPrice; itemTotal += listOptionValueDetails.addonPrice; %>
 <%- listItemOption.optionTitle %> - <%- listItemOption.name %> (+ <%- listOptionValueDetails.addonPriceFormatted %>)
 <% } else if(listItemOption.name) %> <%- listItemOption.optionTitle %> - <%- listItemOption.name %> <% }); } %>
--------------------------
Precio producto  : <%- _oData.fnMisc.formatAmount(listItemProduct.price + totalAddonPrice) %> <% if(listItemProduct.additionalShippingCharge) { var itemShippingCharges = listItemProduct.calculateShipping();  itemTotal += itemShippingCharges; %>
Shipping    : <%- _oData.fnMisc.formatAmount(itemShippingCharges) %><% } %> <% if(listItemProduct.taxPercentage || _oData.configOptions.taxPercentage) { var itemTax = listItemProduct.calculateTax(totalAddonPrice);  itemTotal += itemTax; %>
Tax         : <%- _oData.fnMisc.formatAmount(itemTax) %> <% } %>
Cantidad         : <%- listItem.qty %>
--------------------------
Total producto  :<%- _oData.fnMisc.formatAmount(itemTotal *  listItem.qty) %>
--------------------------
<% }); } %>
<%- _oData.cartStats.totalItems %> producto(s) de <%- _oData.fnMisc.formatAmount(_oData.cartStats.subTotal) %><% var fullTotal = _oData.cartStats.subTotal; if( fullTotal && _oData.cartStats.totalShippingCharges ) { fullTotal += _oData.cartStats.totalShippingCharges; %>
Total Shipping  : <%- _oData.fnMisc.formatAmount( _oData.cartStats.totalShippingCharges ) %> <% } %> <% if( _oData.cartStats.totalTaxes ) { fullTotal += _oData.cartStats.totalTaxes; %>
Taxes       : <%- _oData.fnMisc.formatAmount( _oData.cartStats.totalTaxes ) %> <% } %>
--------------------------
Total del pedido a pagar
<%- _oData.fnMisc.fullFormatAmount(fullTotal) %>

Gracias
```
</script>
    <!-- /Shopping Cart. -->

    <!-- Placed at the end of the document so the pages load faster -->
    <!--  javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="static-assets/packages/other-js-libs/jquery.min.js"></script>
    <script type="text/javascript" src="static-assets/packages/bootstrap-5/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="static-assets/packages/other-js-libs/underscore-min.js"></script>
    <script type="text/javascript" src="static-assets/packages/other-js-libs/jquery.validate.min.js"></script>
    <script type="text/javascript" src="static-assets/packages/other-js-libs/jquery.json.min.js"></script>
    <script type="text/javascript" src="static-assets/packages/other-js-libs/jstorage.min.js"></script>
    <script type="text/javascript" src="static-assets/packages/other-js-libs/jquery.lazy.min.js"></script>
    <script type="text/javascript" src="static-assets/packages/other-js-libs/masonry.pkgd.min.js"></script>
    <script type="text/javascript"
        src="static-assets/lw-jquery-whatsapp-insta-order/js/lw-jquery-whatsapp-insta-order.js"></script>
        
    <?=$this->renderSection('config'); ?>

</body>

</html>