<div>
        <form ng-app="" ng-controller="formSecurity" name="securityForm" novalidate>
          Nama Inputer:<br>          
          <span class="error" ng-show="securityForm.namaInputer.$error.required">
            Nama Inputer harus diisi
          <br /></span>
          <input type="text" name="namaInputer" ng-model="securityInput.namaInputer" placeholder="Masukkan Nama"><br>          
          Nasabah Teller:<br>
          <span class="error" ng-show="securityForm.telerJumlah.$error.number">
            Jumlah nasabah harus berupa angka
          <br /></span>
          <input type="number" name="telerJumlah" ng-model="securityInput.telerJumlah" placeholder="Jumlah Nasabah (Orang)">                    
          <input type="text" ng-model="securityInput.telerInfo" placeholder="Info Tambahan"><br>
          Nasabah Customer Service:<br>
          <span class="error" ng-show="securityForm.CSJumlah.$error.number">
            Jumlah nasabah harus berupa angka
          <br /></span>
          <input type="number" name="CSJumlah" ng-model="securityInput.CSJumlah" placeholder="Jumlah Nasabah (Orang)">
          <input type="text" ng-model="securityInput.CSInfo" placeholder="Info Tambahan"><br>
          Nasabah Marketing:<br>
          <span class="error" ng-show="securityForm.marketingJumlah.$error.number">
            Jumlah nasabah harus berupa angka
          <br /></span>
          <input type="number" name="marketingJumlah" ng-model="securityInput.marketingJumlah" placeholder="Jumlah Nasabah (Orang)">
          <input type="text" ng-model="securityInput.marketingInfo" placeholder="Info Tambahan"><br>
          Nasabah Mikro:<br>
          <span class="error" ng-show="securityForm.mikroJumlah.$error.number">
            Jumlah nasabah harus berupa angka
          <br /></span>
          <input type="number" name="mikroJumlah" ng-model="securityInput.mikroJumlah" placeholder="Jumlah Nasabah (Orang)">
          <input type="text" ng-model="securityInput.mikroInfo" placeholder="Info Tambahan"><br>
          Nasabah Gadai:<br>
          <span class="error" ng-show="securityForm.gadaiJumlah.$error.number">
            Jumlah nasabah harus berupa angka
          <br /></span>
          <input type="number" name="gadaiJumlah" ng-model="securityInput.gadaiJumlah" placeholder="Jumlah Nasabah (Orang)">
          <input type="text" ng-model="securityInput.gadaiInfo" placeholder="Info Tambahan"><br>
          Lain-lain:<br>
          <span class="error" ng-show="securityForm.lainJumlah.$error.number">
            Jumlah nasabah harus berupa angka
          <br /></span>
          <input type="number" name="lainJumlah" ng-model="securityInput.lainJumlah" placeholder="Jumlah Nasabah (Orang)">
          <input type="text" ng-model="securityInput.lainInfo" placeholder="Info Tambahan"><br>
          <br><br>
          
        <div id="laporancontent">            
            <h3>Security</h3>
            <span>Nama inputer : {{securityInput.namaInputer}}</span>
            <table border='solid black 1px'>
                <thead>
                    <th>No</th>
                    <th>Kriteria Nasabah</th>
                    <th>Jumlah Nasabah</th>
                    <th>Info Tambahan</th>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Nasabah Teller</td>                        
                        <td>{{ securityInput.telerJumlah ? securityInput.telerJumlah : '0' }} Orang</td>                        
                        <td>{{ securityInput.telerInfo }}</td>                        
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Nasabah <i>Customer Service</i> (CS)</td>
                        <td>{{ securityInput.CSJumlah ? securityInput.CSJumlah : '0' }} Orang</td>                        
                        <td>{{ securityInput.CSInfo }}</td>                        
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Nasabah Marketing</td>
                        <td>{{ securityInput.marketingJumlah ? securityInput.marketingJumlah : '0' }} Orang</td>                        
                        <td>{{ securityInput.marketingInfo }}</td>                        
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Nasabah Mikro</td>
                        <td>{{ securityInput.mikroJumlah ? securityInput.mikroJumlah : '0' }} Orang</td>                        
                        <td>{{ securityInput.mikroInfo }}</td>                        
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Nasabah Gadai</td>
                        <td>{{ securityInput.gadaiJumlah ? securityInput.gadaiJumlah : '0' }} Orang</td>                        
                        <td>{{ securityInput.gadaiInfo }}</td>                        
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Lain-lain</td>
                        <td>{{ securityInput.lainJumlah ? securityInput.lainJumlah : '0' }} Orang</td>                        
                        <td>{{ securityInput.lainInfo }}</td>                        
                    </tr>
                </tbody>
            </table>
        </div>
          
        </form>
</div>
      <script>
        // script for controller form security
      function formSecurity ($scope) {
          $scope.master = {
                            namaInputer : "",
                            telerJumlah: "", telerInfo: "",                            
                            CSJumlah: "", CSInfo: "",                            
                            marketingJumlah: "", marketingInfo: "",                            
                            mikroJumlah: "", mikroInfo: "",                            
                            gadaiJumlah: "", gadaiInfo: "",                            
                            lainJumlah: "", lainInfo: "",                            
                            };
          $scope.reset = function() {
              $scope.securityInput = angular.copy($scope.master);
          };
          $scope.reset();
      };
      </script> 