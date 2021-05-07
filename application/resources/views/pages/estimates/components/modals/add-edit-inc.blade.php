<div class="row">
    <div class="col-lg-12">

        <!--client-->
        @if(config('visibility.estimate_modal_client_fields'))
        <div class="form-group row">
            <label
                class="col-sm-12 col-lg-3 text-left control-label col-form-label  required">{{ cleanLang(__('lang.client')) }}*</label>
            <div class="col-sm-12 col-lg-9">
                <!--select2 basic search-->
                <select name="bill_clientid" id="bill_clientid"
                    class="clients_and_projects_toggle form-control form-control-sm js-select2-basic-search-modal select2-hidden-accessible"
                    data-projects-dropdown="bill_projectid" data-feed-request-type="clients_projects"
                    data-ajax--url="{{ url('/') }}/feed/company_names">
                </select>
                <!--select2 basic search-->
                </select>
            </div>
        </div>

        <!--projects-->
        <div class="form-group row">
            <label class="col-sm-12 col-lg-3 text-left control-label col-form-label">{{ cleanLang(__('lang.project')) }}</label>
            <div class="col-sm-12 col-lg-9">
                <select class="select2-basic form-control form-control-sm" id="bill_projectid" name="bill_projectid"
                    disabled>
                </select>
            </div>
        </div>
        @endif
        <!--estimate date-->
        <div class="form-group row">
            <label
                class="col-sm-12 col-lg-3 text-left control-label col-form-label required">{{ cleanLang(__('lang.estimate_date')) }}*</label>
            <div class="col-sm-12 col-lg-9">
                <input type="text" class="form-control  form-control-sm pickadate" autocomplete="off" name="bill_date_add_edit"
                    value="{{ runtimeDatepickerDate($estimate->bill_date ?? '') }}" autocomplete="off">
                <input class="mysql-date" type="hidden" name="bill_date" id="bill_date_add_edit"
                    value="{{ $estimate->bill_date ?? '' }}">
            </div>
        </div>

        <!--expirey date-->
        <div class="form-group row">
            <label class="col-sm-12 col-lg-3 text-left control-label col-form-label">{{ cleanLang(__('lang.expiry_date')) }}</label>
            <div class="col-sm-12 col-lg-9">
                <input type="text" class="form-control form-control-sm pickadate" autocomplete="off"
                    name="bill_expiry_date_add_edit" value="{{ runtimeDatepickerDate($estimate->bill_expiry_date ?? '') }}"
                    autocomplete="off">
                <input class="mysql-date" type="hidden" id="bill_expiry_date_add_edit" name="bill_expiry_date"
                    value="{{ $estimate->bill_expiry_date ?? '' }}">
            </div>
        </div>

        <!--estimate category-->
        <div class="form-group row">
            <label class="col-sm-12 col-lg-3 text-left control-label col-form-label required">{{ cleanLang(__('lang.category')) }}*</label>
            <div class="col-sm-12 col-lg-9">
                <select class="select2-basic form-control form-control-sm" id="bill_categoryid" name="bill_categoryid">
                    @foreach($categories as $category)
                    <option value="{{ $category->category_id }}"
                        {{ runtimePreselected($estimate->bill_categoryid ?? '', $category->category_id) }}>{{
                        runtimeLang($category->category_name) }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="line"></div>

        <!--other details-->
        <div class="spacer row">
            <div class="col-sm-12 col-lg-8">
                <span class="title">{{ cleanLang(__('lang.additional_information')) }}</span class="title">
            </div>
            <div class="col-sm-12 col-lg-4">
                <div class="switch  text-right">
                    <label>
                        <input type="checkbox" class="js-switch-toggle-hidden-content"
                            data-target="edit_bill_options_toggle">
                        <span class="lever switch-col-light-blue"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="hidden" id="edit_bill_options_toggle">

            <!--tags-->
            <div class="form-group row">
                <label class="col-12 text-left control-label col-form-label">{{ cleanLang(__('lang.tags')) }}</label>
                <div class="col-12">
                    <select name="tags" id="tags"
                        class="form-control form-control-sm select2-multiple {{ runtimeAllowUserTags() }} select2-hidden-accessible"
                        multiple="multiple" tabindex="-1" aria-hidden="true">
                        <!--array of selected tags-->
                        @if(isset($page['section']) && $page['section'] == 'edit')
                        @foreach($estimate->tags as $tag)
                        @php $selected_tags[] = $tag->tag_title ; @endphp
                        @endforeach
                        @endif
                        <!--/#array of selected tags-->
                        @foreach($tags as $tag)
                        <option value="{{ $tag->tag_title }}"
                            {{ runtimePreselectedInArray($tag->tag_title ?? '', $selected_tags  ?? []) }}>{{ $tag->tag_title }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!--notes-->
            <div class="form-group row">
                <label class="col-12 text-left control-label col-form-label">{{ cleanLang(__('lang.notes')) }}</label>
                <div class="col-12">
                    <textarea id="bill_notes" name="bill_notes"
                        class="tinymce-textarea">{{ $estimate->bill_notes ?? '' }}</textarea>
                </div>
            </div>

            <!--terms-->
            <div class="form-group row">
                <label class="col-12 text-left control-label col-form-label">{{ cleanLang(__('lang.terms')) }}</label>
                <div class="col-12">
                    <textarea id="bill_terms" name="bill_terms" class="tinymce-textarea">
                        @if(isset($page['section']) && $page['section'] == 'create')
                        {{ config('system.settings_estimates_default_terms_conditions') }}
                        @else
                        {{ $estimate->bill_terms ?? '' }}
                        @endif                 
                </textarea>
                </div>
            </div>
        </div>

        <!--source-->
        <input type="hidden" name="source" value="{{ request('source') }}">

        <!--notes-->
        <div class="row">
            <div class="col-12">
                <div><small><strong>* {{ cleanLang(__('lang.required')) }}</strong></small></div>
            </div>
        </div>
    </div>
</div>