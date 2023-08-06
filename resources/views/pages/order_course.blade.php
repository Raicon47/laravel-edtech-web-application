<x-guest-layout>

    <div class="container my-5">
        <main>
          <div class="py-5 text-center">
            <h2 style="color:#5a0b4d;">Order for {{$order->name}}</h2>
          </div>

          <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last">
              <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="" style="color:#5a0b4d;">Your cart</span>
                <span class="badge rounded-pill" style="background:#5a0b4d;">1</span>
              </h4>
              <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-sm">
                  <div>
                    <h6 class="my-0">{{$order->name}}</h6>
                  </div>
                  <span class="text-body-secondary">${{$order->price}}</span>
                </li>

                <li class="list-group-item d-flex justify-content-between bg-body-tertiary">
                  <div class="text-success">
                    <h6 class="my-0">Promo code</h6>
                  </div>
                  <span class="text-success">−$0</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                  <span>Total (USD)</span>
                  <strong>${{$order->price}}</strong>
                </li>
              </ul>

              <form class="card p-2">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Promo code">
                  <button type="submit" disabled class="btn btn-secondary">Redeem</button>
                </div>
              </form>
            </div>

            <div class="col-md-7 col-lg-8">
              <h4 class="mb-3 text-muted">Billing address</h4>
              <form class="needs-validation" method="POST" action="{{route('pay')}}">
                @csrf
                    {{-- hidden input --}}
                    <input type="hidden" value="{{$order->id}}" name="course_id">
                    <input type="hidden" value="{{$order->price}}" name="price">
                    <input type="hidden" value="{{$order->name}}" name="course">

                <div class="row g-3">
                  <div class="col-sm-6">
                    <label for="firstName" class="form-label">Full name</label>
                    <input type="text" name="full_name" class="form-control" id="firstName" placeholder="" value="" required>
                    <div class="invalid-feedback">
                      Valid first name is required.
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <label for="lastName" class="form-label">Phone Number</label>
                    <input type="number" name="phone" class="form-control" id="lastName" placeholder="" value="" required>
                    <div class="invalid-feedback">
                      Valid last name is required.
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="email" class="form-label">Email <span class="text-body-secondary">(Optional)</span></label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com">
                    <div class="invalid-feedback">
                      Please enter a valid email address for shipping updates.
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" id="address" placeholder="1234 Main St" required>
                    <div class="invalid-feedback">
                      Please enter your shipping address.
                    </div>
                  </div>

                  <div class="col-md-5">
                    <label for="country" class="form-label">Country</label>
                    <select class="form-select" name="country" id="country" required>
                      <option value="nigeria">Nigeria</option>
                    </select>
                    <div class="invalid-feedback">
                      Please select a valid country.
                    </div>
                  </div>

                  <div class="col-md-4">
                    <label for="state" class="form-label">State</label>
                    <select class="form-select" name="state" id="state" required>
                      <option value="">Choose...</option>
                      <option>California</option>
                    </select>
                    <div class="invalid-feedback">
                      Please provide a valid state.
                    </div>
                  </div>

                  <div class="col-md-3">
                    <label for="zip" class="form-label">Zip</label>
                    <input type="number" name="zip_code" class="form-control" id="zip" placeholder="" required>
                    <div class="invalid-feedback">
                      Zip code required.
                    </div>
                  </div>
                </div>

                <hr class="my-4">

                <h4 class="mb-3" style="color:#5a0b4d;">
                    Payment
                </h4>

                <div class="my-3">
                  <div class="form-check">
                    <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
                    <label class="form-check-label" for="credit">
                    <img src="{{asset('storage/icons/flutterwave-logo.png')}}" height="20" alt="">
                    Flutterwave</label>
                  </div>
                </div>


                <hr class="my-4">

                <button class="w-100 btn text-light btn-lg" style="background:#5a0b4d;" type="submit">
                    <img src="{{asset('storage/icons/flutterwave-logo.png')}}" height="20" alt="">Pay</button>
              </form>
            </div>
          </div>
        </main>
    </div>

</x-guest-layout>
