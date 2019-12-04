
<div class="row">
        <!--Card-->
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                @include('elements.legend', ['legend' => $legend, 'class' => 'caption'])
                <div class="row">
                    
                    <div class="card-body col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    @include('elements.hidden', [
                        'id' => 'id',
                        'name' => 'id',
                        'class' => null,
                        'value' => $contragent['form-values']['id']
                    ])

                    @include('elements.text', [
                        'label' => \UI::translate('contragents.contragent-name'),
                        'id' => 'contragentname',
                        'class' => null,
                        'name' => 'contragentname',
                        'value' => $contragent['form-values']['contragentname'],
                        'title' => \UI::translate('contragents.enter-contragent-name'),
                        'style' => null,
                        'placeholder' => \UI::translate('contragents.enter-contragent-name'),
                        'onchange' => null,
                        'onclick' => null,
                        'onselect' => null,
                        'onblur' => null
                    ])

                    @include('elements.select', [
                        'label' => \UI::translate('contragents.contragent-type'),
                        'option' => $contragent['form-data']['contragenttype'],
                        'value' => $contragent['form-values']['contragenttype']['id'],
                        'class' => 'select2',
                        'id' => 'contragenttype',
                        'name' => 'contragenttype',
                        'title' => \UI::translate('contragents.contragent-type'),
                        'style' => null,
                        'placeholder' => \UI::translate('contragents.contragent-type'),
                        'onchange' => null,
                        'onclick' => null,
                        'onselect' => null,
                        'onblur' => null
                    ])

                    @include('elements.number', [
                        'label' => \UI::translate('contragents.contragent-DanNom'),
                        'id' => 'contragentDanNom',
                        'class' => null,
                        'name' => 'contragentDanNom',
                        'value' => $contragent['form-values']['contragentDanNom'],
                        'title' => \UI::translate('contragents.enter-contragent-DanNom'),
                        'style' => null,
                        'placeholder' => \UI::translate('contragents.enter-contragent-DanNom'),
                        'onchange' => null,
                        'onclick' => null,
                        'onselect' => null,
                        'onblur' => null
                    ])

                    @include('elements.email', [
                        'label' => \UI::translate('contragents.contragent-email'),
                        'id' => 'contragentemail',
                        'class' => null,
                        'name' => 'contragentemail',
                        'value' => $contragent['form-values']['contragentemail'],
                        'title' => \UI::translate('contragents.enter-contragent-email'),
                        'style' => null,
                        'placeholder' => \UI::translate('contragents.enter-contragent-email'),
                        'onchange' => null,
                        'onclick' => null,
                        'onselect' => null,
                        'onblur' => null
                    ])

                     @include('elements.phone', [
                        'label' => \UI::translate('contragents.contragent-phone'),
                        'id' => 'contragentphone',
                        'class' => null,
                        'name' => 'contragentphone',
                        'value' => $contragent['form-values']['contragentphone'],
                        'title' => \UI::translate('contragents.enter-contragent-phone'),
                        'style' => null,
                        'placeholder' => \UI::translate('contragents.enter-contragent-phone'),
                        'onchange' => null,
                        'onclick' => null,
                        'onselect' => null,
                        'onblur' => null
                    ])

                    @include('elements.select', [
                        'label' => \UI::translate('contragents.contragent-settlements'),
                        'option' => $contragent['form-data']['settlements'],
                        'value' => $contragent['form-values']['contragentsettlementsid'],
                        'class' => 'select2',
                        'id' => 'contragentsettlements',
                        'name' => 'contragentsettlements',
                        'title' => \UI::translate('contragents.contragent-settlements'),
                        'style' => null,
                        'placeholder' => \UI::translate('contragents.contragent-settlements'),
                        'onchange' => null,
                        'onclick' => null,
                        'onselect' => null,
                        'onblur' => null
                    ])

                    @include('elements.select', [
                        'label' => \UI::translate('contragents.contragent-country'),
                        'option' => $contragent['form-data']['countries'],
                        'value' => $contragent['form-values']['contragentcountryid'],
                        'class' => 'select2',
                        'id' => 'contragentcountry',
                        'name' => 'contragentcountry',
                        'title' => \UI::translate('contragents.contragent-country'),
                        'style' => null,
                        'placeholder' => \UI::translate('contragents.contragent-country'),
                        'onchange' => null,
                        'onclick' => null,
                        'onselect' => null,
                        'onblur' => null
                    ])
                </div>

                <div class="card-body col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    @include('elements.radio', [
                        'label' => \UI::translate('contragents.contragent-organizationtype'),
                        'option' => $contragent['form-data']['organizationtypes'],
                        'value' => $contragent['form-values']['contragentorganizationtype']['id'],
                        'class' => 'select2',
                        'id' => 'contragentorganizationtype',
                        'name' => 'contragentorganizationtype',
                        'title' => \UI::translate('contragents.contragent-organizationtype'),
                        'style' => null,
                        'placeholder' => \UI::translate('contragents.contragent-organizationtype'),
                        'onchange' => null,
                        'onclick' => null,
                        'onselect' => null,
                        'onblur' => null
                    ])
                    
                    @include('elements.text', [
                        'label' => \UI::translate('contragents.contragent-EIK'),
                        'id' => 'contragentEIK',
                        'class' => null,
                        'name' => 'contragentEIK',
                        'value' => $contragent['form-values']['contragentEIK'],
                        'title' => \UI::translate('contragents.enter-contragent-EIK'),
                        'style' => null,
                        'placeholder' => \UI::translate('contragents.enter-contragent-EIK'),
                        'onchange' => null,
                        'onclick' => null,
                        'onselect' => null,
                        'onblur' => null
                    ])
                    
                    @include('elements.textarea', [
                        'label' => \UI::translate('contragents.contragent-registration-address'),
                        'id' => 'registrationaddress',
                        'class' => null,
                        'name' => 'registrationaddress',
                        'value' => $contragent['form-values']['contragentregistrationaddress'],
                        'title' => \UI::translate('contragents.contragent-registration-address'),
                        'style' => null,
                        'placeholder' => \UI::translate('contragents.contragent-registration-address'),
                        'onchange' => null,
                        'onclick' => null,
                        'onselect' => null,
                        'onblur' => null
                    ])
                    
                    @include('elements.textarea', [
                        'label' => \UI::translate('contragents.contragent-contact-address'),
                        'id' => 'contactaddress',
                        'class' => null,
                        'name' => 'contactaddress',
                        'value' => $contragent['form-values']['contragentcontactaddress'],
                        'title' => \UI::translate('contragents.contragent-contact-address'),
                        'style' => null,
                        'placeholder' => \UI::translate('contragents.contragent-contact-address'),
                        'onchange' => null,
                        'onclick' => null,
                        'onselect' => null,
                        'onblur' => null
                    ])
                </div>

                </div>

                @include('elements.submit', [
                    'label' => $btnText,
                ])
            </div>
        </div>
    </div>