<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Create New EDAS Account</title>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
  <div class="min-h-screen flex items-center bg-gradient-to-r from-[#1E293B] via-[#334155] to-[#1E293B] py-16 px-4">
    <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg p-8">

      <!-- Header -->
      <div class="flex items-center mb-6">
        <img src="{{ asset('images/EDASlogo.png') }}" alt="EDAS Logo" class="h-12 w-12 mr-4 rounded-lg shadow" />
        <div>
          <h1 class="text-2xl font-bold text-gray-800">Create new account</h1>
          <p class="text-sm text-gray-600">Create a new EDAS account:</p>
        </div>
      </div>

      <!-- Error Messages -->
      @if ($errors->any())
      <div class="mb-4 text-red-700 bg-red-100 border-l-4 border-red-500 px-4 py-2 rounded">
        <ul class="list-disc list-inside">
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

      <!-- Registration Form -->
      <form method="POST">
        @csrf

        <!-- Name Section -->
        <section class="mb-6">
          <h2 class="bg-gray-600 text-white px-3 py-1 rounded-t text-sm font-semibold">Name</h2>
          <div class="border border-gray-300 p-4 rounded-b space-y-4">
            <div>
              <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title</label>
              <select id="title" name="title" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-700">
                <option>-- choose salutation --</option>
                <option value="Dr">Dr.</option>
                <option value="Mr">Mr</option>
                <option value="Mrs">Mrs.</option>
                <option value="Ms">Ms.</option>
                <option value="Mx">Mx.</option>
                <option value="Prof">Prof.</option>
                <option value="Organization">Organization</option>
              </select>
            </div>
            <div>
              <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">Given name (also commonly called first name; please spell out, i.e., Jane instead of J.)</label>
              <input type="text" id="first_name" name="first_name" required 
                class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-700" value="{{ old('first_name') }}" />
            </div>
            <div>
              <label for="middle_initial" class="block text-sm font-medium text-gray-700 mb-1">Middle initial, if any</label>
              <input type="text" id="middle_initial" name="middle_initial" 
                class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-700" value="{{ old('middle_initial') }}" />
            </div>
            <div>
              <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">Surname (also know as family or last name); mixed case, i.e., Smith instead of SMITH</label>
              <input type="text" id="last_name" name="last_name" required 
                class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-700" value="{{ old('last_name') }}" />
            </div>
            <div>
              <label for="name_suffix" class="block text-sm font-medium text-gray-700 mb-1">Name suffix, such as Jr., Sr., or III (not Dr. or Prof. or initials)</label>
              <input type="text" id="name_suffix" name="name_suffix" 
                class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-700" value="{{ old('name_suffix') }}" />
            </div>
          </div>
        </section>

        <!-- Affiliation Section -->
        <section class="mb-6">
          <h2 class="bg-gray-600 text-white px-3 py-1 rounded-t text-sm font-semibold">Affiliation</h2>
          <div class="border border-gray-300 p-4 rounded-b space-y-4">
            <div>
              <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status (for statistics and registration options)</label>
              <select id="status" name="status" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-700">
                <option>-- invalid --</option>
                <option value="student">Student</option>
                <option value="academia">Academia (faculty, postdoc, etc.)</option>
                <option value="industry">Industry (including self-employed)</option>
                <option value="NGO">NGO (non-governmental, scientific societies)</option>
                <option value="government">Government</option>
                <option value="retired">Retired</option>
                <option value="other">Other</option>
                <option value="accompanying">Accompanying person (spouse, child, etc.)</option>
              </select>
            </div>
            <div>
              <label for="current_affiliation" class="block text-sm font-medium text-gray-700 mb-1">Current affiliation (university, company, or government agency; e.g., University of Testing) or <em>none</em></label>
              <input type="text" id="current_affiliation" name="current_affiliation" required 
                class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-700" value="{{ old('current_affiliation') }}" />
            </div>
            <div>
              <label for="additional_affiliations" class="block text-sm font-medium text-gray-700 mb-1">Additional affiliations (e.g., XYZ Company)</label>
              <input type="text" id="additional_affiliations" name="additional_affiliations" 
                class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-700" value="{{ old('additional_affiliations') }}" />
            </div>
            <div>
              <label for="second_country" class="block text-sm font-medium text-gray-700 mb-1">Country of second affiliation, if different (rarely used)</label>
              <select id="second_country" name="second_country" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-700">
                <option>--</option>
                <option value="Afghanistan">Afghanistan</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Brazil">Brazil</option>
                <option value="Brunei">Brunei</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo (Brazzaville)">Congo (Brazzaville)</option>
                <option value="Congo (Kinshasa)">Congo (Kinshasa)</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czechia">Czechia</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Eswatini">Eswatini</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Greece">Greece</option>
                <option value="Grenada">Grenada</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-Bissau">Guinea-Bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Honduras">Honduras</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran">Iran</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Laos">Laos</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libya">Libya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia">Micronesia</option>
                <option value="Moldova">Moldova</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="North Korea">North Korea</option>
                <option value="North Macedonia">North Macedonia</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Qatar">Qatar</option>
                <option value="Romania">Romania</option>
                <option value="Russia">Russia</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Korea">South Korea</option>
                <option value="South Sudan">South Sudan</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syria">Syria</option>
                <option value="Taiwan">Taiwan</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania">Tanzania</option>
                <option value="Thailand">Thailand</option>
                <option value="Timor-Leste">Timor-Leste</option>
                <option value="Togo">Togo</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Vatican City">Vatican City</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Vietnam">Vietnam</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
                <option value="unknown">unknown</option>
              </select>
            </div>
            <div>
              <label for="job_title" class="block text-sm font-medium text-gray-700 mb-1">Job title (e.g., Associate Professor, Senior Wizard, Research assistant)</label>
              <input type="text" id="job_title" name="job_title" 
                class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-700" value="{{ old('job_title') }}" />
            </div>
            <div>
              <label for="department" class="block text-sm font-medium text-gray-700 mb-1">Department</label>
              <input type="text" id="department" name="department" 
                class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-700" value="{{ old('department') }}" />
            </div>
          </div>
        </section>

        <!-- Mailing Address Section -->
        <section class="mb-6">
          <h2 class="bg-gray-600 text-white px-3 py-1 rounded-t text-sm font-semibold">Mailing address</h2>
          <div class="border border-gray-300 p-4 rounded-b space-y-4">
            <div>
              <label for="room" class="block text-sm font-medium text-gray-700 mb-1">Room</label>
              <input type="text" id="room" name="room" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-700" value="{{ old('room') }}" />
            </div>
            <div>
              <label for="street_address" class="block text-sm font-medium text-gray-700 mb-1">Street address</label>
              <input type="text" id="street_address" name="street_address" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-700" value="{{ old('street_address') }}" />
            </div>
            <div>
              <label for="po_box" class="block text-sm font-medium text-gray-700 mb-1">P.O. box</label>
              <input type="text" id="po_box" name="po_box" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-700" value="{{ old('po_box') }}" />
            </div>
            <div>
              <label for="city" class="block text-sm font-medium text-gray-700 mb-1">City</label>
              <input type="text" id="city" name="city" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-700" value="{{ old('city') }}" />
            </div>
            <div>
              <label for="state_province" class="block text-sm font-medium text-gray-700 mb-1">if US or Australia, state; if Canada, province (leave empty or use "n/a" if elsewhere)</label>
              <input type="text" id="state_province" name="state_province" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-700" value="{{ old('state_province') }}" />
            </div>
            <div>
              <label for="region" class="block text-sm font-medium text-gray-700 mb-1">if outside Australia, Canada or US, province or region</label>
              <input type="text" id="region" name="region" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-700" value="{{ old('region') }}" />
            </div>
            <div>
              <label for="postal_code" class="block text-sm font-medium text-gray-700 mb-1">Postal (zip) code, if applicable</label>
              <input type="text" id="postal_code" name="postal_code" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-700" value="{{ old('postal_code') }}" />
            </div>
            <div>
              <label for="country" class="block text-sm font-medium text-gray-700 mb-1">Country (of current residence or affiliation)</label>
              <select name="country" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-700">
                <option>Indonesia</option>
                <option value="Afghanistan">Afghanistan</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Brazil">Brazil</option>
                <option value="Brunei">Brunei</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo (Brazzaville)">Congo (Brazzaville)</option>
                <option value="Congo (Kinshasa)">Congo (Kinshasa)</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czechia">Czechia</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Eswatini">Eswatini</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Greece">Greece</option>
                <option value="Grenada">Grenada</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-Bissau">Guinea-Bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Honduras">Honduras</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran">Iran</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Laos">Laos</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libya">Libya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia">Micronesia</option>
                <option value="Moldova">Moldova</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="North Korea">North Korea</option>
                <option value="North Macedonia">North Macedonia</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Qatar">Qatar</option>
                <option value="Romania">Romania</option>
                <option value="Russia">Russia</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Korea">South Korea</option>
                <option value="South Sudan">South Sudan</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syria">Syria</option>
                <option value="Taiwan">Taiwan</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania">Tanzania</option>
                <option value="Thailand">Thailand</option>
                <option value="Timor-Leste">Timor-Leste</option>
                <option value="Togo">Togo</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Vatican City">Vatican City</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Vietnam">Vietnam</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
                <option value="unknown">unknown</option>
                </select>
            </div>
            <div>
              <label for="country_citizenship" class="block text-sm font-medium text-gray-700 mb-1">Country of citizenship (optional)</label>
              <select id="country_citizenship" name="country_citizenship" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-700">
                <option>-- not specified --</option>
                <option value="Afghanistan">Afghanistan</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Brazil">Brazil</option>
                <option value="Brunei">Brunei</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo (Brazzaville)">Congo (Brazzaville)</option>
                <option value="Congo (Kinshasa)">Congo (Kinshasa)</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czechia">Czechia</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Eswatini">Eswatini</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Greece">Greece</option>
                <option value="Grenada">Grenada</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-Bissau">Guinea-Bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Honduras">Honduras</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran">Iran</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Laos">Laos</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libya">Libya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia">Micronesia</option>
                <option value="Moldova">Moldova</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="North Korea">North Korea</option>
                <option value="North Macedonia">North Macedonia</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Qatar">Qatar</option>
                <option value="Romania">Romania</option>
                <option value="Russia">Russia</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Korea">South Korea</option>
                <option value="South Sudan">South Sudan</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syria">Syria</option>
                <option value="Taiwan">Taiwan</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania">Tanzania</option>
                <option value="Thailand">Thailand</option>
                <option value="Timor-Leste">Timor-Leste</option>
                <option value="Togo">Togo</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Vatican City">Vatican City</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Vietnam">Vietnam</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
                <option value="unknown">unknown</option>


              </select>
            </div>
            <div>
              <label for="VAT" class="block text-sm font-medium text-gray-700 mb-1">VAT or other tax identifier, for receipts</label>
              <input type="text" id="VAT" name="VAT" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-700" value="{{ old('VAT') }}" />
            </div>
          </div>
        </section>

        <!-- Contact Information Section -->
        <section class="mb-6">
          <h2 class="bg-gray-600 text-white px-3 py-1 rounded-t text-sm font-semibold">Contact information</h2>
          <p class="text-sm text-gray-600 mb-4">
            Please use a university, corporate, government, IEEE or ACM email address. Anonymous email addresses may delay creation of the account.
          </p>
          <div class="border border-gray-300 p-4 rounded-b space-y-4">
            <div>
              <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email address (if possible, a university, corporate, government, ACM or IEEE address)</label>
              <input type="email" id="email" name="email" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-700" value="{{ old('email') }}" />
            </div>
            <div>
              <label for="alternate_email_1" class="block text-sm font-medium text-gray-700 mb-1">1st alternate email (optional; use each only once, used for searching and if main email addr...</label>
              <input type="email" id="alternate_email_1" name="alternate_email_1" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-700" value="{{ old('alternate_email_1') }}" />
            </div>
            <div>
              <label for="alternate_email_2" class="block text-sm font-medium text-gray-700 mb-1">2nd alternate email (optional; use each only once, used for searching and if main email add...</label>
              <input type="email" id="alternate_email_2" name="alternate_email_2" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-700" value="{{ old('alternate_email_2') }}" />
            </div>
            <div>
              <label for="alternate_email_3" class="block text-sm font-medium text-gray-700 mb-1">3rd alternate email (optional; use each only once, used for searching and if main email add...</label>
              <input type="email" id="alternate_email_3" name="alternate_email_3" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-700" value="{{ old('alternate_email_3') }}" />
            </div>
          </div>
        </section>

        <!-- Web Pages and Publication Section -->
        <section class="mb-6">
          <h2 class="bg-gray-600 text-white px-3 py-1 rounded-t text-sm font-semibold">Web pages and publication listings</h2>
          <div class="border border-gray-300 p-4 rounded-b space-y-4">
            <div>
              <label for="personal_homepage" class="block text-sm font-medium text-gray-700 mb-1">URL of personal home page (including http:// or https://)</label>
              <input type="url" id="personal_homepage" name="personal_homepage" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-700" value="{{ old('personal_homepage') }}" />
            </div>
            <div>
              <label for="institutional_homepage" class="block text-sm font-medium text-gray-700 mb-1">URL of institutional (university, company, government agency) web page (including http:// pr https:...</label>
              <input type="url" id="institutional_homepage" name="institutional_homepage" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-700" value="{{ old('institutional_homepage') }}" />
            </div>
            <div>
              <label for="dblp_homepage" class="block text-sm font-medium text-gray-700 mb-1">dblp home page (https://dblp.org/pid/... or just the PID)</label>
              <input type="url" id="dblp_homepage" name="dblp_homepage" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-700" value="{{ old('dblp_homepage') }}" />
            </div>
            <div>
              <label for="google_scholar" class="block text-sm font-medium text-gray-700 mb-1">Google Scholar link</label>
              <input type="url" id="google_scholar" name="google_scholar" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-700" value="{{ old('google_scholar') }}" />
            </div>
            <div>
              <label for="orcid_id" class="block text-sm font-medium text-gray-700 mb-1">ORCID identifier</label>
              <input type="text" id="orcid_id" name="orcid_id" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-700" value="{{ old('orcid_id') }}" />
            </div>
            <div>
              <label for="semantic_scholar_id" class="block text-sm font-medium text-gray-700 mb-1">Semantic Scholar numeric identifier</label>
              <input type="text" id="semantic_scholar_id" name="semantic_scholar_id" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-700" value="{{ old('semantic_scholar_id') }}" />
            </div>
          </div>
        </section>
        
        <!-- EDAS privacy policies -->
        <div class="flex items-center space-x-2 mb-4">
          <input id="consent" type="checkbox" class="w-5 h-5 text-red-600 bg-white border border-red-500 rounded focus:ring-red-500 focus:ring-2" />
          <label for="consent" class="text-sm text-gray-700">
            I consent to the 
            <a href="#" class="text-blue-600 hover:underline">EDAS privacy policies</a>
          </label>
        </div>

        <!-- reCAPTCHA -->
        <div class="mb-6 flex justify-center">
          <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
          <button type="submit" class="bg-blue-900 hover:bg-blue-800 text-white font-bold py-3 px-8 rounded transition">Add this person</button>
        </div>
      </form>

      <!-- Back to Login Link -->
      <div class="mt-6 text-center">
        <p class="text-sm text-gray-600">
          Already have an account? <a href="/login" class="text-blue-700 hover:underline font-medium">Back to Login</a>
        </p>
      </div>

    </div>
  </div>
</body>
</html>
