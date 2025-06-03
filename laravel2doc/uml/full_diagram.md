classDiagram
  class Act {
    <<Table: acts>>
    +contract_id
    +signed
    +act_type_id
  }
  class ActRow {
  }
  class Addon {
    <<Table: addons>>
    +name
    +description
    +price_list_id
  }
  class Bill {
  }
  class Booking {
    <<Table: bookings>>
    +rent_unit_id
    +book_at
    +book_until
    +organization_id
    +time_in_minutes
  }
  class BookingTime {
    <<Table: booking_time>>
  }
  class Contract {
    <<Table: contracts>>
    +contract_num
    +1c_contract_num
  }
  class Organization {
    <<Table: organizations>>
    +full_name
    +ur_address
    +post_address
    +bank
    +inn
    +kpp
    +bank_account
    +bank_corr_account
    +bik
    +okpo
  }
  class Payment {
  }
  class Price {
    <<Table: prices>>
  }
  class PriceList {
    <<Table: price_lists>>
    +price()
    +addon()
    +bookingTime()
  }
  class Rent {
    <<Table: rents>>
    +registration_date
    +organization_id
    +price_id
    +number_of_places
    +rent_at
    +contract_id
    +tariff_id
    +status
  }
  class RentUnit {
  }
  class RentUnitType {
  }
  class RentUnitWorkplace {
  }
  class Req {
    <<Table: reqs>>
  }
  class Tariff {
    <<Table: tariffs>>
    +name
    +description
    +price_list_id
  }
  class User {
    +name
    +email
    +password
    +role
    +organization_id
  }
  class Workplace {
  }
  class AuthenticatedSessionController {
    <<Controller>>
    +create()
    +store(LoginRequest $request)
    +destroy(Request $request)
  }
  class ConfirmablePasswordController {
    <<Controller>>
    +show()
    +store(Request $request)
  }
  class EmailVerificationNotificationController {
    <<Controller>>
    +store(Request $request)
  }
  class EmailVerificationPromptController {
    <<Controller>>
    +__invoke(Request $request)
  }
  class NewPasswordController {
    <<Controller>>
    +create(Request $request)
    +store(Request $request)
  }
  class PasswordController {
    <<Controller>>
    +update(Request $request)
  }
  class PasswordResetLinkController {
    <<Controller>>
    +create()
    +store(Request $request)
  }
  class RegisteredUserController {
    <<Controller>>
    +create()
    +store(Request $request)
  }
  class VerifyEmailController {
    <<Controller>>
    +__invoke(EmailVerificationRequest $request)
  }
  class AuthController {
    <<Controller>>
    +login()
    +store(LoginRequest $request)
    +destroy(Request $request)
  }
  class BookingController {
    <<Controller>>
    +__construct(protected BookingViewConfigFactory $bookingViewConfigFactory,)
    +create()
  }
  class Controller {
    <<Controller>>
  }
  class OrganizationController {
    <<Controller>>
    +__construct(protected OrganizationViewConfigFactory $organizationViewConfigFactory,)
  }
  class PriceListController {
    <<Controller>>
    +__construct(protected PriceListViewConfigFactory $viewConfigFactory)
  }
  class ProfileController {
    <<Controller>>
    +edit(Request $request)
    +update(ProfileUpdateRequest $request)
    +destroy(Request $request)
  }
  class RentUnitController {
    <<Controller>>
    +__construct(protected RentUnitViewConfigFactory $rentUnitViewConfigFactory,)
  }
  class RentUnitTypeController {
    <<Controller>>
    +__construct(protected RentUnitTypeViewConfigFactory $rentUnitTypeViewConfigFactory,)
  }
  class RentUnitTypeControllerTenant {
    <<Controller>>
    +__construct(protected RentUnitTypeViewConfigFactory $rentUnitTypeViewConfigFactory,)
    +rent(Request $request)
    +getPrice()
  }
  class RestController {
    <<Controller>>
    +__construct()
    +index()
    +create()
    +store(Request $request)
    +show($id)
    +edit($id)
    +update(Request $request, $id)
    +destroy($id)
  }
  class TariffController {
    <<Controller>>
    +__construct(protected TariffViewConfigFactory $viewConfigFactory)
  }
  class UserController {
    <<Controller>>
    +__construct(protected UserViewConfigFactory $userViewConfigFactory,)
  }
  Act --> Bill : bill
  Act --* ActRow : actrows
  Act <-- Rent : rent
  ActRow <-- Act : act
  Addon <-- PriceList : pricelist
  Bill --* Payment : payments
  Booking <-- User : user
  Booking <-- RentUnit : rentunit
  BookingTime <-- PriceList : pricelist
  BookingTime <-- Tariff : tariff
  BookingTime <-- RentUnit : rentunit
  Organization --* User : user
  Payment <-- Bill : bill
  Price --* Rent : rent
  Price <-- Tariff : tariff
  Price <-- PriceList : pricelist
  Rent --* Act : act
  Rent --* Workplace : workplace
  Rent <-- Contract : contract
  Rent <-- Organization : organization
  Rent <-- Price : price
  Rent <-- Tariff : tariff
  RentUnit --* BookingTime : bookingtime
  RentUnit --* Booking : booking
  RentUnit --* ActRow : actrows
  RentUnit <-- RentUnitType : type
  RentUnit <--* Workplace : workplace
  RentUnitType --* RentUnit : rentunits
  Req <-- User : user
  Tariff --* Price : price
  Tariff --* BookingTime : bookingtime
  Tariff --* Rent : rent
  Workplace <-- Rent : rent
  Workplace <--* RentUnit : rentunit
