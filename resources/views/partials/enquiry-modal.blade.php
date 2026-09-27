{{-- Specification enquiry (EnquiryModal.dc.html). Opened by any [data-enquire] control; posts to /enquiries. --}}
<div class="modal fade rs-modal" id="enquiry" tabindex="-1" aria-labelledby="enq-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-lg-down">
        <div class="modal-content" data-state="form">
            <form class="modal__form" method="POST" action="{{ route('enquiries.store') }}" novalidate data-enquiry-form>
                @csrf
                <input type="hidden" name="type" value="spec">
                <input type="hidden" name="product" value="">
                <input type="hidden" name="spec" value="">
                <input type="hidden" name="source" value="{{ url()->current() }}">

                <div class="modal__head">
                    <div>
                        <span class="eyebrow">Specification enquiry</span>
                        <h2 id="enq-title" class="modal__title" data-show="form">Tell us your spec. We will quote it honestly.</h2>
                        <h2 class="modal__title" data-show="success">Enquiry received</h2>
                    </div>
                    <button type="button" class="icon-btn" data-bs-dismiss="modal" aria-label="Close enquiry form">
                        <x-ui-icon name="x" :size="20" />
                    </button>
                </div>

                <ol class="modal__steps" data-show="form">
                    <li class="is-current" data-step="1"><b>1</b> <span>Product</span></li>
                    <li data-step="2"><b>2</b> <span>Quantity</span></li>
                    <li data-step="3"><b>3</b> <span>Notes</span></li>
                </ol>

                <div class="modal__body">
                    <div class="about-box" data-show="form">
                        <span class="about-box__label">Enquiring about</span>
                        <span class="about-box__product" data-about-product>Any line — help me choose</span>
                        <span class="about-box__spec" data-about-spec>Tell us the carton weight and how it travels, and we will specify the micron, width and adhesive.</span>
                    </div>

                    <div class="rs-alert" role="alert" hidden data-alert>
                        <x-ui-icon name="circle-alert" :size="18" />
                        <span data-alert-text>Some fields need attention before we can route this to the right specialist.</span>
                    </div>

                    <div class="fields" data-show="form">
                        <div class="field-row">
                            <div class="field">
                                <label for="enq-quantity">Estimated quantity</label>
                                <input id="enq-quantity" name="quantity" placeholder="e.g. 40 boxes" autocomplete="off" aria-describedby="enq-quantity-error enq-quantity-hint" required>
                                <span class="field__error" id="enq-quantity-error" data-error="quantity"></span>
                                <span class="field__hint" id="enq-quantity-hint">Boxes, bags or pallets — an estimate is fine.</span>
                            </div>
                            <div class="field">
                                <label for="enq-weight">Typical box weight</label>
                                <input id="enq-weight" name="box_weight" placeholder="e.g. 12 kg" autocomplete="off" aria-describedby="enq-weight-hint">
                                <span class="field__hint" id="enq-weight-hint">Lets us confirm the micron grade.</span>
                            </div>
                        </div>
                        <div class="field-row">
                            <div class="field">
                                <label for="enq-email">Work email</label>
                                <input id="enq-email" name="email" type="email" placeholder="you@company.com" autocomplete="email" aria-describedby="enq-email-error" required>
                                <span class="field__error" id="enq-email-error" data-error="email"></span>
                            </div>
                            <div class="field">
                                <label for="enq-phone">Mobile / WhatsApp</label>
                                <input id="enq-phone" name="phone" type="tel" placeholder="+91 " autocomplete="tel">
                            </div>
                        </div>
                        <div class="field">
                            <label for="enq-notes">Requirement notes</label>
                            <textarea id="enq-notes" name="message" rows="3" placeholder="Width, adhesion conditions, cold storage, logo colours — anything that affects the spec." aria-describedby="enq-notes-hint"></textarea>
                            <span class="field__hint" id="enq-notes-hint">Sealing on a high-speed carton line? Say so — it changes the tack we recommend.</span>
                        </div>
                    </div>

                    <div class="success" data-show="success">
                        <div class="success__head">
                            <span class="success__icon"><x-ui-icon name="check" :size="26" /></span>
                            <div>
                                <span class="success__title">Thank you</span>
                                <p class="success__ref">Reference <strong data-ref>RQ-0000</strong> · sent to our tape specialists</p>
                            </div>
                        </div>
                        <div class="panel">
                            <strong>What happens next</strong>
                            <p>A specialist confirms micron and adhesive suitability for your load, then sends indicative volume pricing within one working day. If your artwork is ready, attach it to the WhatsApp thread and we will return a print proof with it.</p>
                        </div>
                        <div class="about-box">
                            <span class="about-box__label">Your spec, on record</span>
                            <span class="about-box__product" data-summary></span>
                        </div>
                    </div>
                </div>

                <div class="modal__foot">
                    <div data-show="form">
                        <div class="btn-row">
                            <button type="submit" class="rs-btn rs-btn--primary rs-btn--grow"><x-ui-icon name="mail" :size="18" /> Send enquiry by email</button>
                            <a class="rs-btn rs-btn--eco rs-btn--grow" href="{{ \App\Support\Site::whatsapp() }}" data-whatsapp-enquiry target="_blank" rel="noopener"><x-ui-icon name="message-circle" :size="18" /> Send on WhatsApp</a>
                        </div>
                        <p class="modal__note mt-2">No obligation, no automated sales calls. Your budget, our honest execution.</p>
                    </div>
                    <div class="btn-row" data-show="success">
                        <a class="rs-btn rs-btn--eco rs-btn--grow" href="{{ \App\Support\Site::whatsapp() }}" data-whatsapp-enquiry target="_blank" rel="noopener"><x-ui-icon name="message-circle" :size="18" /> Continue on WhatsApp</a>
                        <a class="rs-btn rs-btn--outline rs-btn--grow" href="{{ route('products.index') }}">Back to catalog</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
