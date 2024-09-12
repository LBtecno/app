<?=$this->extend('templates/layout') ?>
<?=$this->section('config') ?>

<script>
        $(document).ready(function () {
            $("body").whatsAppInstaOrder({
                // data url for products json
                // set if other than default
                dataUrl: "data-provider/<?=$productos ?>.json",
                siteBaseUrl: "",
                // whatever to force fresh data or not
                forceFresh: false,
                // your store name
                storeName: "<?=$negocio ?>",
                // logo image path
                logoImage: "",
                // set currency symbol
                currencySymbol: "$",
                // currency symbol
                currency: "MXN",
                // checkout methods
                checkoutMethods: {
                    orderByWhatsApp: {
                        // enable this gateway or not
                        enable: true,
                        // Your Mobile Number with 0 and country code
                        mobileNumber: '<?=$numero ?>',
                        // Enable the order types you required
                        // no shipping charges will be levied if user chooses takeaway or table order type
                        orderTypes: {
                            // if user wants to pickup the order
                            takeaway: {
                                enable: true,
                                title: "Para llevar",
                            },
                            //   if the user wants delivery of the item
                            // full address will be asked by the system
                            delivery: {
                                // it will enable the form to submit address information
                                enable: true,
                                title: "A domicilio",
                            },
                            // will enable the table number field
                            table: {
                                enable: true,
                                title: "Mesa",
                            },
                        },
                        // gateway title
                        title: "Pedido solicitado",
                        // method name do not change
                        method: "orderByWhatsApp",
                        // button element will be created using following information
                        btnElement: {
                            id: "#whatsappCheckout",
                            class: "btn-success",
                            title:
                                '<i class="fab fa-whatsapp"></i> Envíar pedido',
                            // imageUrl : 'image path for button'
                        }
                    }
                },
                // global shipping charges in amount
                shippingCharges: 0,
                // global tax charges in percentage
                taxPercentage: 0,
                // do you want to search product description
                searchProductDetails: true,
                // do you want to search the product ids
                searchProductIds: true,
                // do you want to search the product category ids
                searchCategoryIds: true,
                // per page item for the load more pagination
                perPageCount: 12,
            });
        });
    </script>

<?=$this->endSection() ?>