<div class="container">     
    <ul>
                <li id="_msgId" class="msgContainer"></li>
                <li id="_contentBlock"><ul class="boxYellow">
                        <li class="boxTitle"><h3>Đăng Ký Thành Viên</h3></li>
                        <li class="boxContent">
                             
                            <div class="tooltipLogin">
                                <?php if (isset($error)): ?>
                                    <?php echo $error; ?>
                                <?php else: ?>
                                <?php endif; ?>
                            </div> 
                            <?php echo form_open_multipart('home/register', array('id' => 'frmRegister')); ?>
                            <ul class="frmRegister">
                                <li class="gTitleGray"><h4>Thông Tin Đăng Nhập</h4></li>
                                <li>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="textRequiredField">Tên đăng nhập</td>
                                                <td><input id="username" name="username" 
                                                           maxlength="32" class="inputBig" style="width: 200px;"
                                                           type="text"></td>
                                            </tr>
                                            <tr>
                                                <td class="textRequiredField">Mật khẩu</td>
                                                <td><input name="password"  maxlength="32"
                                                           class="inputBig" style="width: 200px;" type="password"></td>
                                            </tr>
                                            <tr>
                                                <td class="textRequiredField">Xác nhận mật khẩu</td>
                                                <td><input name="confirm_password"  maxlength="32"
                                                           class="inputBig" style="width: 200px;" type="password"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </li>
                                <li class="gTitleGray"><h4>Thông Tin Cá Nhân</h4></li>
                                <li>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="textRequiredField">Họ và tên</td>
                                                <td><input name="full_name"  maxlength="50"
                                                           class="inputBig" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td class="textRequiredField">Giới tính</td>
                                                <td><input name="gender" value="0" checked="checked"
                                                           type="radio">Nam&nbsp; <input name="gender" value="1"
                                                           type="radio">Nữ</td>
                                            </tr>
                                            <tr>
                                                <td class="textRequiredField">Ngày sinh</td>
                                                <td><select name="day_of_birth" 
                                                            style="width: 99px" class="selectBig" ><option
                                                            selected="selected" value="">---Ngày---</option>
                                                        <option label="01" value="1">01</option>
                                                        <option label="02" value="2">02</option>
                                                        <option label="03" value="3">03</option>
                                                        <option label="04" value="4">04</option>
                                                        <option label="05" value="5">05</option>
                                                        <option label="06" value="6">06</option>
                                                        <option label="07" value="7">07</option>
                                                        <option label="08" value="8">08</option>
                                                        <option label="09" value="9">09</option>
                                                        <option label="10" value="10">10</option>
                                                        <option label="11" value="11">11</option>
                                                        <option label="12" value="12">12</option>
                                                        <option label="13" value="13">13</option>
                                                        <option label="14" value="14">14</option>
                                                        <option label="15" value="15">15</option>
                                                        <option label="16" value="16">16</option>
                                                        <option label="17" value="17">17</option>
                                                        <option label="18" value="18">18</option>
                                                        <option label="19" value="19">19</option>
                                                        <option label="20" value="20">20</option>
                                                        <option label="21" value="21">21</option>
                                                        <option label="22" value="22">22</option>
                                                        <option label="23" value="23">23</option>
                                                        <option label="24" value="24">24</option>
                                                        <option label="25" value="25">25</option>
                                                        <option label="26" value="26">26</option>
                                                        <option label="27" value="27">27</option>
                                                        <option label="28" value="28">28</option>
                                                        <option label="29" value="29">29</option>
                                                        <option label="30" value="30">30</option>
                                                        <option label="31" value="31">31</option>
                                                    </select> <select name="month_of_birth" 
                                                                      style="width: 108px" class="selectBig" ><option
                                                            selected="selected" value="">---Tháng---</option>
                                                        <option label="01" value="1">01</option>
                                                        <option label="02" value="2">02</option>
                                                        <option label="03" value="3">03</option>
                                                        <option label="04" value="4">04</option>
                                                        <option label="05" value="5">05</option>
                                                        <option label="06" value="6">06</option>
                                                        <option label="07" value="7">07</option>
                                                        <option label="08" value="8">08</option>
                                                        <option label="09" value="9">09</option>
                                                        <option label="10" value="10">10</option>
                                                        <option label="11" value="11">11</option>
                                                        <option label="12" value="12">12</option>
                                                    </select> <select name="year_of_birth" 
                                                                      style="width: 99px" class="selectBig" ><option
                                                            selected="selected" value="">---Năm---</option>
                                                        <option label="2008" value="2008">2008</option>
                                                        <option label="2007" value="2007">2007</option>
                                                        <option label="2006" value="2006">2006</option>
                                                        <option label="2005" value="2005">2005</option>
                                                        <option label="2004" value="2004">2004</option>
                                                        <option label="2003" value="2003">2003</option>
                                                        <option label="2002" value="2002">2002</option>
                                                        <option label="2001" value="2001">2001</option>
                                                        <option label="2000" value="2000">2000</option>
                                                        <option label="1999" value="1999">1999</option>
                                                        <option label="1998" value="1998">1998</option>
                                                        <option label="1997" value="1997">1997</option>
                                                        <option label="1996" value="1996">1996</option>
                                                        <option label="1995" value="1995">1995</option>
                                                        <option label="1994" value="1994">1994</option>
                                                        <option label="1993" value="1993">1993</option>
                                                        <option label="1992" value="1992">1992</option>
                                                        <option label="1991" value="1991">1991</option>
                                                        <option label="1990" value="1990">1990</option>
                                                        <option label="1989" value="1989">1989</option>
                                                        <option label="1988" value="1988">1988</option>
                                                        <option label="1987" value="1987">1987</option>
                                                        <option label="1986" value="1986">1986</option>
                                                        <option label="1985" value="1985">1985</option>
                                                        <option label="1984" value="1984">1984</option>
                                                        <option label="1983" value="1983">1983</option>
                                                        <option label="1982" value="1982">1982</option>
                                                        <option label="1981" value="1981">1981</option>
                                                        <option label="1980" value="1980">1980</option>
                                                        <option label="1979" value="1979">1979</option>
                                                        <option label="1978" value="1978">1978</option>
                                                        <option label="1977" value="1977">1977</option>
                                                        <option label="1976" value="1976">1976</option>
                                                        <option label="1975" value="1975">1975</option>
                                                        <option label="1974" value="1974">1974</option>
                                                        <option label="1973" value="1973">1973</option>
                                                        <option label="1972" value="1972">1972</option>
                                                        <option label="1971" value="1971">1971</option>
                                                        <option label="1970" value="1970">1970</option>
                                                        <option label="1969" value="1969">1969</option>
                                                        <option label="1968" value="1968">1968</option>
                                                        <option label="1967" value="1967">1967</option>
                                                        <option label="1966" value="1966">1966</option>
                                                        <option label="1965" value="1965">1965</option>
                                                        <option label="1964" value="1964">1964</option>
                                                        <option label="1963" value="1963">1963</option>
                                                        <option label="1962" value="1962">1962</option>
                                                        <option label="1961" value="1961">1961</option>
                                                        <option label="1960" value="1960">1960</option>
                                                        <option label="1959" value="1959">1959</option>
                                                        <option label="1958" value="1958">1958</option>
                                                        <option label="1957" value="1957">1957</option>
                                                        <option label="1956" value="1956">1956</option>
                                                        <option label="1955" value="1955">1955</option>
                                                        <option label="1954" value="1954">1954</option>
                                                        <option label="1953" value="1953">1953</option>
                                                        <option label="1952" value="1952">1952</option>
                                                        <option label="1951" value="1951">1951</option>
                                                        <option label="1950" value="1950">1950</option>
                                                        <option label="1949" value="1949">1949</option>
                                                        <option label="1948" value="1948">1948</option>
                                                        <option label="1947" value="1947">1947</option>
                                                        <option label="1946" value="1946">1946</option>
                                                        <option label="1945" value="1945">1945</option>
                                                        <option label="1944" value="1944">1944</option>
                                                        <option label="1943" value="1943">1943</option>
                                                        <option label="1942" value="1942">1942</option>
                                                        <option label="1941" value="1941">1941</option>
                                                        <option label="1940" value="1940">1940</option>
                                                        <option label="1939" value="1939">1939</option>
                                                        <option label="1938" value="1938">1938</option>
                                                        <option label="1937" value="1937">1937</option>
                                                        <option label="1936" value="1936">1936</option>
                                                        <option label="1935" value="1935">1935</option>
                                                        <option label="1934" value="1934">1934</option>
                                                        <option label="1933" value="1933">1933</option>
                                                    </select></td>
                                            </tr>

                                            <tr>
                                                <td class="textRequiredField">Tỉnh/Thành phố</td>
                                                <td id="stateBlock">
                                                    <select id="stateId" name="state_id"
                                                            class="selectBig">
                                                        <option value="0">Tỉnh/Thành phố</option>
                                                        <option label="Hưng Yên" value="74">Hưng Yên</option>
                                                        <option label="Điện Biên" value="73">Điện Biên</option>
                                                        <option label="Đăk Nông" value="72">Đăk Nông</option>
                                                        <option label="Hậu Giang" value="71">Hậu Giang</option>
                                                        <option label="Yên Bái" value="70">Yên Bái</option>
                                                        <option label="Vĩnh Phúc" value="69">Vĩnh Phúc</option>
                                                        <option label="Vĩnh Long" value="68">Vĩnh Long</option>
                                                        <option label="Tuyên Quang" value="67">Tuyên Quang</option>
                                                        <option label="Trà Vinh" value="66">Trà Vinh</option>
                                                        <option label="Tiền Giang" value="65">Tiền Giang</option>
                                                        <option label="Thừa Thiên Huế" value="64">Thừa Thiên Huế</option>
                                                        <option label="Thanh Hoá" value="63">Thanh Hoá</option>
                                                        <option label="Thái Nguyên" value="62">Thái Nguyên</option>
                                                        <option label="Thái Bình" value="61">Thái Bình</option>
                                                        <option label="Tây Ninh" value="60">Tây Ninh</option>
                                                        <option label="Sơn La" value="59">Sơn La</option>
                                                        <option label="Sóc Trăng" value="58">Sóc Trăng</option>
                                                        <option label="Quảng Trị" value="57">Quảng Trị</option>
                                                        <option label="Quảng Ninh" value="56">Quảng Ninh</option>
                                                        <option label="Quảng Ngãi" value="55">Quảng Ngãi</option>
                                                        <option label="Quảng Nam" value="54">Quảng Nam</option>
                                                        <option label="Quảng Bình" value="53">Quảng Bình</option>
                                                        <option label="Phú Thọ" value="52">Phú Thọ</option>
                                                        <option label="Ninh Thuận" value="50">Ninh Thuận</option>
                                                        <option label="Ninh Bình" value="49">Ninh Bình</option>
                                                        <option label="Nghệ An" value="48">Nghệ An</option>
                                                        <option label="Nam Định" value="47">Nam Định</option>
                                                        <option label="Long An" value="46">Long An</option>
                                                        <option label="Lào Cai" value="45">Lào Cai</option>
                                                        <option label="Lạng Sơn" value="44">Lạng Sơn</option>
                                                        <option label="Lâm Đồng" value="43">Lâm Đồng</option>
                                                        <option label="Lai Châu" value="42">Lai Châu</option>
                                                        <option label="Kon Tum" value="41">Kon Tum</option>
                                                        <option label="Kiên Giang" value="40">Kiên Giang</option>
                                                        <option label="Khánh Hòa" value="39">Khánh Hòa</option>
                                                        <option label="Tp.HCM" value="38" selected="selected">Tp.HCM</option>
                                                        <option label="Phú Yên" value="37">Phú Yên</option>
                                                        <option label="Hòa Bình" value="36">Hòa Bình</option>
                                                        <option label="Hải Phòng" value="35">Hải Phòng</option>
                                                        <option label="Hải Dương" value="34">Hải Dương</option>
                                                        <option label="Hà Tĩnh" value="33">Hà Tĩnh</option>
                                                        <option label="Hà Tây" value="32">Hà Tây</option>
                                                        <option label="Hà Nội" value="31">Hà Nội</option>
                                                        <option label="Hà Nam" value="30">Hà Nam</option>
                                                        <option label="Hà Giang" value="29">Hà Giang</option>
                                                        <option label="Gia Lai" value="28">Gia Lai</option>
                                                        <option label="Đồng Tháp" value="27">Đồng Tháp</option>
                                                        <option label="Đồng Nai" value="26">Đồng Nai</option>
                                                        <option label="Đắk lắk" value="25">Đắk lắk</option>
                                                        <option label="Đà Nẵng" value="24">Đà Nẵng</option>
                                                        <option label="Cần Thơ" value="23">Cần Thơ</option>
                                                        <option label="Cao Bằng" value="22">Cao Bằng</option>
                                                        <option label="Cà Mau" value="21">Cà Mau</option>
                                                        <option label="Bình Thuận" value="20">Bình Thuận</option>
                                                        <option label="Bình Phước" value="19">Bình Phước</option>
                                                        <option label="Bình Định" value="18">Bình Định</option>
                                                        <option label="Bình Dương" value="17">Bình Dương</option>
                                                        <option label="Bến Tre" value="16">Bến Tre</option>
                                                        <option label="Bắc Ninh" value="15">Bắc Ninh</option>
                                                        <option label="Bắc Giang" value="14">Bắc Giang</option>
                                                        <option label="Bắc Cạn" value="13">Bắc Cạn</option>
                                                        <option label="Bạc Liêu" value="12">Bạc Liêu</option>
                                                        <option label="Bà Rịa - Vũng Tàu" value="11">Bà Rịa - Vũng
                                                            Tàu</option>
                                                        <option label="An Giang" value="10">An Giang</option>

                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td class="textRequiredField">Lĩnh vực chuyên môn</td>
                                                <td><select name="occupation_id"  class="selectBig"><option
                                                            label="An ninh - Cảnh sát" value="1">An ninh - Cảnh sát</option>
                                                        <option label="Bán lẻ" value="2">Bán lẻ</option>
                                                        <option label="Bao bì" value="3">Bao bì</option>
                                                        <option label="Báo chí - Truyền thông" value="4">Báo chí -
                                                            Truyền thông</option>
                                                        <option label="Bất động sản" value="5">Bất động sản</option>
                                                        <option label="Chăm sóc sức khoẻ - Y tế" value="6">Chăm sóc
                                                            sức khoẻ - Y tế</option>
                                                        <option label="Chế tạo máy" value="7">Chế tạo máy</option>
                                                        <option label="Chính phủ" value="8">Chính phủ</option>
                                                        <option label="CNTT - Dịch vụ" value="9">CNTT - Dịch vụ</option>
                                                        <option label="CNTT - Mạng" value="10">CNTT - Mạng</option>
                                                        <option label="CNTT - Phần cứng" value="154">CNTT - Phần cứng</option>
                                                        <option label="CNTT - Phần mềm" value="12"
                                                                selected="selected">CNTT - Phần mềm</option>
                                                        <option label="Dầu khí - Khoán sản" value="13">Dầu khí -
                                                            Khoán sản</option>
                                                        <option label="Dệt may" value="14">Dệt may</option>
                                                        <option label="Dịch vụ tiêu dùng" value="15">Dịch vụ tiêu
                                                            dùng</option>
                                                        <option label="Điện - Điện tử" value="16">Điện - Điện tử</option>
                                                        <option label="Điện lực - Cung cấp nước" value="17">Điện lực
                                                            - Cung cấp nước</option>
                                                        <option label="Đồ gỗ - Trang trí nội thất" value="18">Đồ gỗ -
                                                            Trang trí nội thất</option>
                                                        <option label="Du lịch - Khách sạn" value="19">Du lịch -
                                                            Khách sạn</option>
                                                        <option label="Dược - Công nghệ sinh học" value="20">Dược -
                                                            Công nghệ sinh học</option>
                                                        <option label="Giải trí" value="21">Giải trí</option>
                                                        <option label="Giáo dục - Huấn luyện - Thư viện" value="22">Giáo
                                                            dục - Huấn luyện - Thư viện</option>
                                                        <option label="Giấy &amp; Sản phẩm lâm nghiệp" value="23">Giấy
                                                            &amp; Sản phẩm lâm nghiệp</option>
                                                        <option label="Hàng không" value="24">Hàng không</option>
                                                        <option label="Hàng tiêu dùng" value="25">Hàng tiêu dùng</option>
                                                        <option label="Hoá chất" value="26">Hoá chất</option>
                                                        <option label="In ấn" value="27">In ấn</option>
                                                        <option label="Internet" value="28">Internet</option>
                                                        <option label="Kế toán - Kiểm toán" value="155">Kế toán -
                                                            Kiểm toán</option>
                                                        <option label="Kho bãi" value="30">Kho bãi</option>
                                                        <option label="Kiến trúc &amp; Hoạch định" value="31">Kiến
                                                            trúc &amp; Hoạch định</option>
                                                        <option label="Mỹ phẩm" value="32">Mỹ phẩm</option>
                                                        <option label="Nghệ thuật biểu diễn" value="33">Nghệ thuật
                                                            biểu diễn</option>
                                                        <option label="Nhà hàng - Ăn uống" value="34">Nhà hàng - Ăn
                                                            uống</option>
                                                        <option label="Nhân sự - Tuyển dụng" value="35">Nhân sự -
                                                            Tuyển dụng</option>
                                                        <option label="Nhựa" value="36">Nhựa</option>
                                                        <option label="Nông nghiệp - Lâm nghiệp" value="37">Nông
                                                            nghiệp - Lâm nghiệp</option>
                                                        <option label="Ô tô - Xe máy" value="38">Ô tô - Xe máy</option>
                                                        <option label="Phân phối - Bán sỉ" value="39">Phân phối - Bán
                                                            sỉ</option>
                                                        <option label="Pháp lý" value="40">Pháp lý</option>
                                                        <option label="Phi chính phủ - Lợi nhuận" value="41">Phi
                                                            chính phủ - Lợi nhuận</option>
                                                        <option label="Quân đội &amp; Quốc phòng" value="42">Quân đội
                                                            &amp; Quốc phòng</option>
                                                        <option label="Quảng cáo - Đối ngoại" value="43">Quảng cáo -
                                                            Đối ngoại</option>
                                                        <option label="Sản xuất" value="44">Sản xuất</option>
                                                        <option label="Tài chính - Bảo hiểm" value="45">Tài chính -
                                                            Bảo hiểm</option>
                                                        <option label="Tài chính - Đầu tư" value="46">Tài chính - Đầu
                                                            tư</option>
                                                        <option label="Tài chính - Doanh nghiệp" value="47">Tài chính
                                                            - Doanh nghiệp</option>
                                                        <option label="Tài chính - Ngân hàng" value="48">Tài chính -
                                                            Ngân hàng</option>
                                                        <option label="Thể thao" value="49">Thể thao</option>
                                                        <option label="Thiết kế" value="50">Thiết kế</option>
                                                        <option label="Thời trang" value="51">Thời trang</option>
                                                        <option label="Thủ công mỹ nghệ" value="52">Thủ công mỹ nghệ</option>
                                                        <option label="Thực phẩm &amp; Thức uống" value="53">Thực
                                                            phẩm &amp; Thức uống</option>
                                                        <option label="Thuốc lá" value="54">Thuốc lá</option>
                                                        <option label="Tiếp thị" value="55">Tiếp thị</option>
                                                        <option label="Trang sức &amp; Hàng cao cấp" value="56">Trang
                                                            sức &amp; Hàng cao cấp</option>
                                                        <option label="Tư vấn" value="57">Tư vấn</option>
                                                        <option label="Vận chuyển - Hậu cần" value="58">Vận chuyển -
                                                            Hậu cần</option>
                                                        <option label="Vật liệu xây dựng" value="59">Vật liệu xây
                                                            dựng</option>
                                                        <option label="Viễn thông" value="60">Viễn thông</option>
                                                        <option label="Viết văn - Biên tập - Dịch thuật" value="61">Viết
                                                            văn - Biên tập - Dịch thuật</option>
                                                        <option label="Xây dựng" value="62">Xây dựng</option>
                                                        <option label="Xuất bản" value="63">Xuất bản</option>
                                                        <option label="Xuất nhập khẩu" value="64">Xuất nhập khẩu</option>
                                                        <option label="Sinh viên" value="11">Sinh viên</option>
                                                        <option label="Lĩnh vực khác" value="29">Lĩnh vực khác</option>
                                                    </select></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </li>

                                <li class="gTitleGray"><h4>Thông Tin Liên Hệ</h4></li>
                                <li>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="textRequiredField">E-mail</td>
                                                <td><input name="email"  maxlength="128"
                                                           class="inputBig" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td class="textRequiredField">ĐTDĐ</td>
                                                <td><input name="phone"  maxlength="40"
                                                           class="inputBig" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td class="textRequiredField">Địa chỉ</td>
                                                <td><input name="mem_address"  maxlength="200"
                                                           class="inputBig" type="text"></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td class="note">- VD: 0918596004 (không được nhập 84 phía
                                                    trước)<br> - Số điện thoại phải đúng để thực hiện các dịch vụ
                                                    trên Vnstockgame
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </li>
                                <li class="captcha">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="textRequiredField">Mã xác nhận</td>
                                                <td width="1%">
                                                        <!--  <input name="captcha_code" maxlength="10" class="inputBig" type="text"> -->
                                                    <input type="text" name="captcha"   autocomplete="off" /> 

                                                </td>
                                                <td>
                                                    <img src="<?php echo base_url('captcha.php'); ?>"    class="table-Hcell" id="captcha" />  <br/>
                                                    <a href="#" onclick="
                                     document.getElementById('captcha').src = '<?php echo base_url('captcha.php'); ?>?' + Math.random();
                                     document.getElementById('captcha-form').focus();"
                                                       id="change-image">Làm mới </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td class="note" colspan="2">Nhập lại mã xác nhận hiển thị
                                                    trong hình bên.</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </li>
                                <li class="registerCmd">
                                    <input  value="Đăng Ký" name="reg_submit" id="reg_submit" class="btnYellow" style="margin-right: 10px;" type="submit"/>

                                    <input   value="Nhập Lại" class="btnYellow"   type="submit"/>

                                </li>
                            </ul>
                            <?php echo form_close(); ?>
                        </li>
                    </ul></li>
            </ul>
</div>


