@include('elements.legend', ['legend' => $legend, 'class' => 'caption'])
<div class="row">
    @include('elements.hidden', [
    'id' => 'id',
    'name' => 'id',
    'class' => null,
    'value' => $person['form-values']['id']
    ])

    <div class="col-lg-6">
        <div class="card card-primary">
            <div class="card-heading">
                <h3 class="card-title">{!! UI::translate('persons.person-basicdata') !!}</h3>
            </div>
            <div class="card-body">
            @include('elements.text', [
                'label' => \UI::translate('persons.person-firstname'),
                'id' => 'person-firstname',
                'class' => null,
                'name' => 'personfirstname',
                'value' => $person['form-values']['first_name'],
                'title' => \UI::translate('persons.enter-person-firstname'),
                'style' => null,
                'placeholder' => \UI::translate('persons.enter-person-firstname'),
                'onchange' => null,
                'onclick' => null,
                'onselect' => null,
                'onblur' => null
                ])

            @include('elements.text', [
                'label' => \UI::translate('persons.person-familyname'),
                'id' => 'person-familyname',
                'class' => null,
                'name' => 'personfamilyname',
                'value' => $person['form-values']['family_name'],
                'title' => \UI::translate('persons.enter-person-familyname'),
                'style' => null,
                'placeholder' => \UI::translate('persons.enter-person-familyname'),
                'onchange' => null,
                'onclick' => null,
                'onselect' => null,
                'onblur' => null
                ])

            @include('elements.number', [
                'label' => \UI::translate('persons.person-identificationnumber'),
                'id' => 'person-identificationnumber',
                'class' => null,
                'name' => 'personidentificationnumber',
                'value' => $person['form-values']['identification_number'],
                'title' => \UI::translate('persons.enter-person-identificationnumber'),
                'style' => null,
                'placeholder' => \UI::translate('persons.enter-person-identificationnumber'),
                'onchange' => null,
                'onclick' => null,
                'onselect' => null,
                'onblur' => null
                ])
            </div>
        </div>
    </div>
    
    <div class="col-lg-6">
         <div class="card card-primary">
            <div class="card-heading">
                <h3 class="card-title">{!! UI::translate('persons.person-contact') !!}</h3>
            </div>
            <div class="card-body">
                @include('elements.text', [
                    'label' => \UI::translate('persons.person-mailing-address'),
                    'id' => 'personmailingaddress',
                    'class' => null,
                    'name' => 'personmailingaddress',
                    'value' => $person['form-values']['mailing_address'],
                    'title' => \UI::translate('persons.enter-person-mailing-address'),
                    'style' => null,
                    'placeholder' => \UI::translate('persons.enter-person-mailing-address'),
                    'onchange' => null,
                    'onclick' => null,
                    'onselect' => null,
                    'onblur' => null
                ])

                @include('elements.email', [
                    'label' => \UI::translate('persons.person-email'),
                    'id' => 'personemail',
                    'class' => null,
                    'name' => 'personemail',
                    'value' => $person['form-values']['email'],
                    'title' => \UI::translate('persons.enter-person-email'),
                    'style' => null,
                    'placeholder' => \UI::translate('persons.enter-person-email'),
                    'onchange' => null,
                    'onclick' => null,
                    'onselect' => null,
                    'onblur' => null
                ])

                @include('elements.text', [
                    'label' => \UI::translate('persons.person-phone'),
                    'id' => 'personphone',
                    'class' => null,
                    'name' => 'personphone',
                    'value' => $person['form-values']['phone'],
                    'title' => \UI::translate('persons.enter-person-phone'),
                    'style' => null,
                    'placeholder' => \UI::translate('persons.enter-person-phone'),
                    'onchange' => null,
                    'onclick' => null,
                    'onselect' => null,
                    'onblur' => null
                ])
            </div>
        </div>
    </div>

    <div class="col-lg-12">
         <div class="card card-primary">
            <div class="card-heading">
                <h3 class="card-title">{!! UI::translate('persons.person-other') !!}</h3>
            </div>
            <div class="card-body">
            @include('elements.text', [
                'label' => \UI::translate('persons.person-idcard'),
                'id' => 'personidcard',
                'class' => null,
                'name' => 'personidcard',
                'value' => $person['form-values']['idcard'],
                'title' => \UI::translate('persons.enter-person-idcard'),
                'style' => null,
                'placeholder' => \UI::translate('persons.enter-person-idcard'),
                'onchange' => null,
                'onclick' => null,
                'onselect' => null,
                'onblur' => null
            ])

            @include('elements.text', [
                'label' => \UI::translate('persons.person-address-idcard'),
                'id' => 'personaddressidcard',
                'class' => null,
                'name' => 'personaddressidcard',
                'value' => $person['form-values']['address_idcard'],
                'title' => \UI::translate('persons.enter-person-address-idcard'),
                'style' => null,
                'placeholder' => \UI::translate('persons.enter-person-address-idcard'),
                'onchange' => null,
                'onclick' => null,
                'onselect' => null,
                'onblur' => null
            ])
            
            @include('elements.date', [
                'label' => \UI::translate('persons.person-idcard-date-of-issue'),
                'id' => 'personidcarddateofissue',
                'class' => null,
                'name' => 'personidcarddateofissue',
                'value' => $person['form-values']['idcard_date_of_issue'],
                'title' => \UI::translate('persons.enter-person-idcard-date-of-issue'),
                'style' => null,
                'placeholder' => \UI::translate('persons.enter-person-idcard-date-of-issue'),
                'onchange' => null,
                'onclick' => null,
                'onselect' => null,
                'onblur' => null
                ])

            @include('elements.date', [
                'label' => \UI::translate('persons.person-idcard-date-of-expiry'),
                'id' => 'personidcarddateofexpiry',
                'class' => null,
                'name' => 'personidcarddateofexpiry',
                'value' => $person['form-values']['idcard_date_of_expiry'],
                'title' => \UI::translate('persons.enter-person-idcard-date-of-expiry'),
                'style' => null,
                'placeholder' => \UI::translate('persons.enter-person-idcard-date-of-expiry'),
                'onchange' => null,
                'onclick' => null,
                'onselect' => null,
                'onblur' => null
                ])

            @include('elements.select', [
                'label' => \UI::translate('persons.person-published-by'),
                'option' => $person['form-data']['settlements'],
                'value' => $person['form-values']['publishedby_id'],
                'class' => 'select2',
                'id' => 'personpublishedby',
                'name' => 'personpublishedby',
                'title' => \UI::translate('persons.person-published-by'),
                'style' => null,
                'placeholder' => \UI::translate('persons.enter-person-published-by'),
                'onchange' => null,
                'onclick' => null,
                'onselect' => null,
                'onblur' => null
                ])
            </div>
        </div>
    </div>

        @include('elements.submit', [
            'label' => $btnText,
        ])
</div>